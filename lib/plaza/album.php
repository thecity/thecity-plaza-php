<?php

  /** 
  * Project:    OnTheCity API 
  * File:       album.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * A album instance.  This object is immutable.
   *
   * @package OnTheCity
   */
  class Album extends PlazaCommon {
    
    /**
     * Constructor.
     *
     * @param array $data a Hash containing all the data to initialize this album.
     */
    public function __construct($data) {
      parent::__construct($data);
    }
    
    
    /**
     * @return The responses to the album.
     */
    public function posts() {
      $rposts = array();
      foreach ($this->data->album_responses as $album_response) { 
        $name = 'Unknown';
        if( !is_null($album_response->user) ) {
          $name = $album_response->user->long_name;
        } 
        else if( !is_null($album_response->facebook_user) ) {
          $name = $album_response->facebook_user->first.' '.$album_response->facebook_user->last;
        }

        $rposts[] = array(
          'created_at' => $album_response->created_at,
          'who_posted' => $name,
          'content'    => $this->clean_text( $album_response->body ),
        );
      }       
      return $rposts;
    }
    
  }
?>
