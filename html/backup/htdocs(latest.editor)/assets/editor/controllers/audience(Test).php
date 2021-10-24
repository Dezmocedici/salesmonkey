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

	session_start();
	$_SESSION['businessID'] = 32;
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'customers', 'id' )
	->fields(
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

		Field::inst( 'customers.address' ),

		Field::inst( 'customers.subscribe' )

)
	->join (
			Mjoin::inst( 'tags' )
			->link( 'customers.id', 'tag_register.customer_id' )
			->link( 'tags.id', 'tag_register.tag_id' )
			->fields(
				Field::inst( 'tags.name' )
					->validator( 'Validate:: required' )
					->options( Options::inst()
						->table( 'tags' )
						->value( 'name' )
						->label( 'name' )
					)
				)
		)


	->where( 'business_id', $_SESSION['businessID'] )


	->debug( true )
	->process( $_POST )
	->json();
