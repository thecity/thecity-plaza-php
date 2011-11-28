<?php

  /** 
  * Project:    OnTheCity API 
  * File:       albums_loader.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class loads the Plaza needs for the subdomain.
   *
   * @package OnTheCity
   */
  class AlbumsLoader {

    // The URL to load the albums from.
    private $url = '';

    // The object to store and load the cache.
    private $cacher;

    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     */
    public function __construct($subdomain) {
      $this->url = "http://$subdomain.onthecity.org/plaza/albums?format=json";      
    }
    
    
    /**
     *  Loads all the prayers on the Plaza for the subdomain.
     *
     * @return JSON The data loaded in a JSON object.
     */  
    public function load_feed() {
      $json = file_get_contents($this->url); 
      $this->json_data = json_decode($json);  
      return $this->json_data;
    }
    
  }
?>