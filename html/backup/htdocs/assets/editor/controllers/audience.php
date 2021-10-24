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
	$_SESSION['userID'] = 17;
	$_SESSION['businessID'] = 32;

	function insertLog($db, $action, $id, &$values)
	{
		$db->insert( 'logs', array(
			'activity' => $action,
			'user_id' => $_SESSION['userID'],
			'business_id' => $_SESSION['businessID'],
			'time' => time()
		) );
	}
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'customers', 'id' )
	->fields(
		Field::inst( 'business_id' )
			->setValue( $_SESSION['businessID']),

		Field::inst( 'user_id' )
			->setValue( $_SESSION['userID']),

		Field::inst( 'first_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A first name is required' )
			) ),

		Field::inst( 'last_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A last name is required' )
			) ),

		Field::inst( 'email' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::email( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This e-mail address already existsd in our database. Please enter e-mail address.' )
			) ),

		Field::inst( 'phone' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please enter phone number.' )
			) )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This phone number already existsd in our database. Please enter new phone number.' )
			) )
			->validator( Validate::minMaxLen( 10, 10, ValidateOptions::inst()
			->message( 'Phone number should contains 10 digits.' )
			) ),

		Field::inst( 'address' ),

		Field::inst( 'subscribe' )

)
	->where( 'business_id', $_SESSION['businessID'] )
	->on( 'postCreate', function ($editor, $id, &$values, &$row){
		insertLog( $editor->db(), 'Add Customer', $id, $values);
	} )
	->on( 'postEdit', function ($editor, $id, &$values, &$row){
		insertLog( $editor->db(), 'Edit Customer', $id, $values);
	} )
	->on( 'preRemove', function ($editor, $id, &$values){
		insertLog( $editor->db(), 'Delete Customer', $id, $values);
	} )

	->debug( true )
	->process( $_POST )
	->json();
