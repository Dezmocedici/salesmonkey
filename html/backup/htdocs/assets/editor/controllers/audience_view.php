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
Editor::inst( $db, 'customers_view', 'id' )
	->fields(
		Field::inst( 'customers_view.first_name' ),

		Field::inst( 'customers_view.last_name' ),

		Field::inst( 'customers_view.email' ),

		Field::inst( 'customers_view.phone' ),

		Field::inst( 'customers_view.address' ),

		Field::inst( 'customers_view.subscribe' ),

		Field::inst( 'customers_view.tags' )

	)
	->where( 'customers_view.business_id', $_SESSION['businessID'] )

	->debug(true)
	->process( $_POST )
	->json();
