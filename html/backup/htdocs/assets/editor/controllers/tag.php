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

	function insertTagRegister($db)
	{
		$db->insert( 'tag_register', array(
			'customer_id' => $_SESSION['userID'],
			'business_id' => $_SESSION['businessID'],
			'tag_id' => checkTag($conn, $cID, $bID)
			) );
	}

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'tags', 'id' )
	->fields(
		Field::inst( 'tags.name' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'A name is required.' )
			) ),

		Field::inst( 'tags.description' ),

		Field::inst( 'tags.colour_id' )
			->options( Options::inst()
					->table( 'colours' )
					->value( 'id' )
					->label( 'colour' )
					)
			->validator( Validate::notEmpty( ValidateOptions::inst()
			->message( 'Please select tag colour.' )
			) )

	)
	->leftJoin( 'tag_register', 'tag_register.tag_id', '=', 'tags.id' )
	->where( 'tag_register.business_id', $_SESSION['businessID'] )
	->debug(true)
	->process( $_POST )
	->json();
