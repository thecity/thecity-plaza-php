<?php

  /** 
  * Project:    OnTheCity API 
  * File:       prayers_loader.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class loads the Plaza prayers for the subdomain.
   *
   * @package OnTheCity
   */
  class PrayersLoader {

    // Data used to capture the contents of the tag.
    private $json_data = '';
    
    // The URL to load the prayers from.
    private $url = '';


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     */
    public function __construct($subdomain) {
      $this->url = "http://$subdomain.onthecity.org/plaza/topics?format=json";      
      
      echo "Prayers Loader";
    }
    
  }
?>