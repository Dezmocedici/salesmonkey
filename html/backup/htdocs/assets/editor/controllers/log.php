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
	$_SESSION['businessID'] = 1;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'logs', 'id' )
	->fields(
		Field::inst( 'logs.user_id' ),

		Field::inst( 'logs.business_id' ),

		Field::inst( 'logs.activity' ),

		Field::inst( 'logs.time' ),

		Field::inst( 'users.first_name' ),

		Field::inst( 'users.last_name' ),

		Field::inst( 'businesses.name' )

	)
	->leftJoin( 'businesses', 'businesses.id', '=', 'logs.business_id' )
	->leftJoin( 'users', 'users.id', '=', 'logs.user_id' )
	->debug(true)
	->process( $_POST )
	->json();
