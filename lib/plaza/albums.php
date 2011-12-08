<?php

  /** 
  * Project:    OnTheCity API 
  * File:       albums.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class is a wrapper for the albums page.
   *
   * @package OnTheCity
   */
  class Albums extends Plaza {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param AlbumsLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      parent::__construct();
      $this->json_data = $loader->load_feed();
    }


    /**
    *  All the public albums on the Plaza.
    *  @return array of albums.
    */
    public function all() {
      $albums = array();
      foreach ($this->json_data as $album) { $albums[] = $album->global_event->title; }
      return $albums;
    }
    
    
    /**
     * Get the specified prayer.
     *
     * @param index The index of the prayer to get all the information for.
     *
     * @return array of data for the topic.
     * array(
     *  'title' => '...',
     *  'created_at => '...',
     *  'who_posted' => '...',
     *  'content' => '...',
     *  'album_responses' => array( 
     *    array(
     *      'created_at' => '...',
     *      'who_posted' => '...',
     *      'content' => '...'
     *    )
     * )
     */
    public function get_album($index) {
      $ralbum = array();
      $ralbum['title'] = $this->json_data[$index]->global_topic->title;   
      $ralbum['created_at'] = $this->json_data[$index]->global_topic->created_at;
      $ralbum['who_posted'] = $this->json_data[$index]->global_topic->user->long_name;
      $ralbum['content'] = $this->clean_text( $this->json_data[$index]->global_album->body );
      
      $ralbum['album_responses'] = array();
      foreach ($this->json_data[$index]->global_album->album_responses as $album_response) { 
        $name = 'Unknown';
        if( !is_null($album_response->user) ) {
          $name = $album_response->user->long_name;
        } 
        else if( !is_null($album_response->facebook_user) ) {
          $name = $album_response->facebook_user->first.' '.$album_response->facebook_user->last;
        }
        
        $ralbum['posts'][] = array(
          'created_at' => $album_response->created_at,
          'who_posted' => $name,
          'content'    => $this->clean_text( $album_response->body ),
        );
      }
       
      return $ralbum;
    }
    
  }
?>