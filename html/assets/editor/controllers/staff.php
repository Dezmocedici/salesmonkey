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


//Generate hashed password and send password to email.
function generatePasword()
{
	//Store user's email from $values(this is an array of values when user submited a form)
	$key = array_keys($_POST['data']);
	$key = $key[0];
	$to = $_POST['data'][$key]['users']['email'];

	// $to = $values['users']['email'];

	//Store password from uniqid()
	$password = uniqid();

	//Hash password with password_hash
	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	//Declare subject for the email
	$subject = 'Your account has been created | SalesMonkey';

	//Declear message with a password in it
	$message = '<html><body><p>'  .'Your password is: ' . $password . '</p></body></html>';

	//Decalre header and conect type for the email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <no-reply@salesmonkey.local>' . "\r\n";
	$headers .= 'Cc: no-reply@salesmonkey.local' . "\r\n";

	//Send out the new password via email
	$mail = mail($to, $subject, $message, $headers);

	//return password
	return $hashedPassword;
}

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'users', 'id' )
	->fields(

		Field::inst( 'users.first_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A first name is required.' )
			) ),

		Field::inst( 'users.last_name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A last name is required.' )
			) ),

		Field::inst( 'users.email' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::email( ValidateOptions::inst()
			->message( 'Please enter an e-mail address.' )
			) )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This e-mail address is already already in use.' )
			) ),

		Field::inst( 'users.password' ),

		Field::inst( 'users.phone' )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This phone number is already already in use.' )
			) )
			->validator( Validate::minMaxLen( 10, 10, ValidateOptions::inst()
			->message( 'Phone number should contains 10 digits.' )
			) ),

		Field::inst( 'users.user_type' ),

		Field::inst( 'users.created' ),

		Field::inst( 'users.modified' )

	)

	->leftJoin( 'relationships', 'relationships.user_id', '=', 'users.id' )

	->where( 'relationships.business_id', $_SESSION['businessID'] )

	//Set created & modified time before row being inseted
	//preCreate : (cancellable) - Triggered prior to creating a new row and before validation has occurred, allowing extra validation to be added or values to be set
	->on( 'preCreate', function ($editor, &$values)
		{
			//Set password into field
			$editor->field( 'users.password' ) ->setValue( generatePasword() );
			$editor->field( 'users.created' )  ->setValue( time() );
			$editor->field( 'users.modified' ) ->setValue( time() );

		}
	)

	//Insert a relationship between user and business at the same time with form submited
	//writeCreate: Data has been written to the database, but not yet read back, allowing the database to be updated before the data is gathered to display in the table
	->on( 'writeCreate', function ($editor, $id, &$values)
		{
			$db = $editor->db();
			//Insert relationship into relationships table
			$db->insert( 'relationships', array('user_id' => $id, 'business_id' => $_SESSION['businessID']) );
			//Insert create log into logs table
			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Create a staff', 'time' => time() ) );
		}
	)

	//preEdit : (cancellable) Triggered prior to updating an existing row and before validation has occurred
	->on( 'preEdit', function ($editor, $id, &$values)
		{
			$db = $editor->db();

			//Insert update log into logs table
			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Update a staff detail', 'time' => time() ) );
			//Set modified field to currect time
			$editor->field( 'users.modified' )->setValue( time() );
		}
	)

	//postRemove : Triggered immediately after a row has been deleted
	->on( 'postRemove', function ($editor, $id, &$values)
		{
			$db = $editor->db();

			//Delete relationships from $id ( $id === row_id )
			$db->delete( 'relationships', array( 'user_id' => $id) );

			//Insert delete log into logs table
			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Delete a staff', 'time' => time() ) );
		}
	)

	->process( $_POST )
	->json();
