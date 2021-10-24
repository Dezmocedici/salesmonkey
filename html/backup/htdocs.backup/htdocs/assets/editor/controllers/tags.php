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
Editor::inst( $db, 'tags' )
	->fields(
		Field::inst( 'name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'A tag name is required' )
			) ),
		Field::inst( 'description' ),
		Field::inst( 'colour_id' )->validator( 'Validate::notEmpty' )
	)
	->debug(true)
	->process( $_POST )
	->json();
