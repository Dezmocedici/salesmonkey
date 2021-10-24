<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include("../lib/DataTables.php");

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
Editor::inst($db, 'tags')
    ->fields(
        Field::inst('tags.name')
            ->validator(Validate::notEmpty(ValidateOptions::inst()
                ->message('A name is required.')
            )),

        Field::inst('tags.description'),


// To prevent duplicate tag
//SELECT * FROM `colours` WHERE id NOT IN (SELECT DISTINCT (colour_id) FROM tags WHERE business_id = $_SESSION[businessID])
        Field::inst('tags.colour_id')
            ->options(Options::inst()
                ->table('colours')
                ->value('colours.id')
                ->label('colours.colour')
            )
            ->validator(Validate::notEmpty(ValidateOptions::inst()
                ->message('Please select tag colour.')
            )),

        Field::inst('tags.business_id')
            ->setvalue($_SESSION['businessID']
          ),

        Field::inst( 'tags.created' ),
        Field::inst( 'tags.modified' )
    )
    ->where( 'tags.business_id', $_SESSION['businessID'] )

    //preCreate : (cancellable) - Triggered prior to creating a new row and before validation has occurred, allowing extra validation to be added or values to be set
    ->on( 'preCreate', function ($editor, &$values)
    {
      $editor->field( 'tags.created' )  ->setValue( time() );
      $editor->field( 'tags.modified' ) ->setValue( time() );
    } )

  	//writeCreate: Data has been written to the database, but not yet read back, allowing the database to be updated before the data is gathered to display in the table
  	->on( 'writeCreate', function ( $editor, $id, &$values )
  		{
  			$db = $editor->db();
  			//Insert create log into logs table
  			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Create a tag', 'time' => time() ));
  		} )

  	//preEdit : (cancellable) Triggered prior to updating an existing row and before validation has occurred
  	->on( 'preEdit', function ($editor, $id, &$values)
  		{
  			$db = $editor->db();

  			//Insert update log into logs table
  			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Update a tag detail', 'time' => time() ));
        //Set modified field to currect time
        $editor->field( 'tags.modified' )->setValue( time() );
  		} )

  	//postRemove : Triggered immediately after a row has been deleted
  	->on( 'postRemove', function ($editor, $id, &$values)
  	{
  		$db = $editor->db();

  		//Insert delete log into logs table
  		$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Delete a tag', 'time' => time() ));
  	} )

		//->debug(true)
    ->process($_POST)
    ->json();
