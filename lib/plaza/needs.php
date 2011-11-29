<?php

  /** 
  * Project:    OnTheCity API 
  * File:       needs.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class is a wrapper for the needs page.
   *
   * @package OnTheCity
   */
  class Needs {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param NeedsLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      $this->json_data = $loader->load_feed();
    }
    
    /**
     *  All the public needs on the Plaza.
     *  @return array of needs.
     */
    public function all_needs() {
      $needs = array();
      foreach ($this->json_data as $need) { $needs[] = $need->global_need->title; }
      return $needs;
    }
    
  }
?>