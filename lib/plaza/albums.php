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
     * @return Album
     */
    public function get_album($index) {
      return new Album( $this->json_data[$index]->global_topic );
    }
    
  }
?>