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
Editor::inst($db, 'campaigns')
    ->fields(
        Field::inst( 'campaigns.user_id' )
            ->setValue( $_SESSION['id'] ),

        Field::inst( 'campaigns.business_id' )
            ->setValue( $_SESSION['businessID' ] ),

        Field::inst( 'campaigns.name' )
            ->validator(Validate::notEmpty(ValidateOptions::inst()
            ->message('A name is required.')
            )
          ),
        Field::inst( 'campaigns.sender' ),
        Field::inst( 'campaigns.send_to' ),
        Field::inst( 'campaigns.subject' ),
        Field::inst( 'campaigns.content' ),
        Field::inst( 'campaigns.scheduled' ),
        Field::inst( 'campaigns.schedule_date' ),
        Field::inst( 'campaigns.status' ),
        Field::inst( 'campaigns.created' ),
        Field::inst( 'campaigns.modified' )
    )
    ->join(
      Mjoin::inst( 'templates')
      ->link( 'campaigns.id', 'template_register.campaign_id')
      ->link( 'templates.id', 'template_register.template_id')

      ->fields(
        Field::inst( 'id' )
        ->options( Options::inst()
        ->table( 'templates' )
        ->value( 'id' )
        ->label( 'name' )
        ->where( function ( $q )
        {
          $q->where( 'business_id', $_SESSION['businessID'], '=' );
        }
      )))
      )
    // ->join(
    //   	Mjoin::inst( 'tags' )
    //     ->link( 'campaigns.id', 'tag_register.customer_id' )
    //     ->link( 'tags.id', 'tag_register.tag_id' )
    //     ->fields(
    //   Field::inst( 'id' )
    //     ->options( Options::inst()
    //     ->table( 'tags' )
    //     ->value( 'id' )
    //   	->label( 'name' )
  	// 		->where( function ( $q )
  	// 		{
  	// 			$q->where( 'business_id', $_SESSION['businessID'], '=' );
  	// 		}
  	// 		))



    ->where( 'campaigns.business_id', $_SESSION['businessID'] )

    //preCreate : (cancellable) - Triggered prior to creating a new row and before validation has occurred, allowing extra validation to be added or values to be set
    ->on( 'preCreate', function ($editor, &$values)
    {
      $editor->field( 'campaigns.created' )  ->setValue( time() );
      $editor->field( 'campaigns.modified' ) ->setValue( time() );
    } )

  	//writeCreate: Data has been written to the database, but not yet read back, allowing the database to be updated before the data is gathered to display in the table
  	->on( 'writeCreate', function ( $editor, $id, &$values )
  		{
  			$db = $editor->db();
  			//Insert create log into logs table
  			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Create a campaign', 'time' => time() ));
  		} )

  	//preEdit : (cancellable) Triggered prior to updating an existing row and before validation has occurred
  	->on( 'preEdit', function ($editor, $id, &$values)
  		{
  			$db = $editor->db();

  			//Insert update log into logs table
  			$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Update a campaign detail', 'time' => time() ));
        //Set modified field to currect time
        $editor->field( 'campaigns.modified' )->setValue( time() );
  		} )

  	//postRemove : Triggered immediately after a row has been deleted
  	->on( 'postRemove', function ($editor, $id, &$values)
  	{
  		$db = $editor->db();

  		//Insert delete log into logs table
  		$db->insert( 'logs', array( 'user_id' => $_SESSION['id'], 'business_id' => $_SESSION['businessID'], 'activity' => 'Delete a campaign', 'time' => time() ));
  	} )

		->debug(true)
    ->process($_POST)
    ->json();
