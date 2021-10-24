<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'customers' )
	->fields(
		Field::inst( 'customers.business_id' )
			->setValue( $_SESSION['businessID']),

		Field::inst( 'customers.user_id' )
			->setValue( $_SESSION['id']),

		Field::inst( 'customers.first_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A first name is required' )
			) ),

		Field::inst( 'customers.last_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A last name is required' )
			) ),

		Field::inst( 'customers.email' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::email( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This e-mail address already existsd in our database. Please enter e-mail address.' )
			) ),

		Field::inst( 'customers.phone' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please enter phone number.' )
			) )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This phone number already existsd in our database. Please enter new phone number.' )
			) )
			->validator( Validate::minMaxLen( 10, 10, ValidateOptions::inst()
			->message( 'Phone number should contains 10 digits.' )
			) ),

		Field::inst( 'customers.created' ),

		Field::inst( 'customers.modified' ),

		Field::inst( 'customers.address' ),

		Field::inst( 'customers.subscribe' )
)

  ->join(
    	Mjoin::inst( 'tags' )
      ->link( 'customers.id', 'tag_register.customer_id' )
      ->link( 'tags.id', 'tag_register.tag_id' )
      ->fields(
    Field::inst( 'id' )
      ->options( Options::inst()
      ->table( 'tags' )
      ->value( 'id' )
    	->label( 'name' )
			->where( function ( $q )
			{
				$q->where( 'business_id', $_SESSION['businessID'], '=' );
			}
			)),
		Field::inst( 'business_id' )
			->setValue( $_SESSION['businessID'] ),

		Field::inst( 'name' ),

		Field::inst( 'colour_id' )
      ))



	//Fetch data only have
	->where( 'business_id', $_SESSION['businessID'] )

	//preCreate : (cancellable) - Triggered prior to creating a new row and before validation has occurred, allowing extra validation to be added or values to be set
	->on( 'preCreate', function ($editor, &$values)
	{
		$editor->field( 'customers.created' )  ->setValue( time() );
		$editor->field( 'customers.modified' ) ->setValue( time() );
	} )

	//writeCreate: Data has been written to the database, but not yet read back, allowing the database to be updated before the data is gathered to display in the table
	->on( 'writeCreate', function ( $editor, $id, &$values )
		{
			$db = $editor->db();
			//Insert create log into logs table
			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Create a customer', 'time' => time() ) );
		} )

	//preEdit : (cancellable) Triggered prior to updating an existing row and before validation has occurred
	->on( 'preEdit', function ($editor, $id, &$values)
		{
			$db = $editor->db();

			//Insert update log into logs table
			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Update a customer', 'time' => time() ) );
			//Set modified field to currect time
			$editor->field( 'customers.modified' )->setValue( time() );
		} )

	//postRemove : Triggered immediately after a row has been deleted
	->on( 'postRemove', function ($editor, $id, &$values)
	{
		$db = $editor->db();

		//Insert delete log into logs table
		$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Delete a customer', 'time' => time() ) );
	} )

	//->debug( true )
	->process( $_POST )
	->json();
