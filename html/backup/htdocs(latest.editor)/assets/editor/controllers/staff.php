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
	$_SESSION['userID'] = 65;
	$_SESSION['businessID'] = 47;

function insertRelationShip($db)
{
	$db->insert( 'relationships', array(
		'user_id' => $_SESSION['userID'],
		'business_id' => $_SESSION['businessID']
	) );
}

function deleteRelationshipQuery($db, $uID, $id, &$values)
{
	$conn = mysqli_connect("localhost", "root", "#Password1", "salesmonkey");

  $sql = "DELETE FROM relationships WHERE user_id = ?;";
  $stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
	{
		header('LOCATION: ' . $_SERVER['PHP_SELF'] . '?error=invalid-sql');
		exit();
	}

  mysqli_stmt_bind_param($stmt, "s", $uID);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
}

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
			->message( 'This e-mail address already existsd in our database. Please enter e-mail address.' )
			) ),

		Field::inst( 'users.phone' )
			->validator( Validate::unique( ValidateOptions::inst()
			->message( 'This phone number already existsd in our database. Please enter new phone number.' )
			) )
			->validator( Validate::minMaxLen( 10, 10, ValidateOptions::inst()
			->message( 'Phone number should contains 10 digits.' )
			) ),

		Field::inst( 'users.user_type' )
	)

	->leftJoin( 'relationships', 'relationships.user_id', '=', 'users.id' )
	->where( 'relationships.business_id', $_SESSION['businessID'] )

	->on( 'postCreate', function ($editor, $id, &$values, &$row){
		insertLog( $editor->db(), 'Add Staff', $id, $values);
	} )
	->on( 'postCreate', function ($editor, $id, &$values, &$row){
		insertRelationShip( $editor->db() );
	} )
	->on( 'postEdit', function ($editor, $id, &$values, &$row){
		insertLog( $editor->db(), 'Edit Staff', $id, $values);
	} )
	->on( 'preRemove', function ($editor, $id, &$values){
		deleteRelationshipQuery( $editor->db(), $_SESSION['userID'], $id, $values);
	} )

	->debug(true)
	->process( $_POST )
	->json();
