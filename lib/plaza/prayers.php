<?php

  /** 
  * Project:    OnTheCity API 
  * File:       prayers.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class is a wrapper for the prayers page.
   *
   * @package OnTheCity
   */
  class Prayers {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param PrayersLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      $this->json_data = $loader->load_feed();
    }
    
    /**
     *  All the public prayers on the Plaza.
     *  @return array of prayers.
     */
    public function all_prayers() {
      $prayers = array();
      foreach ($this->json_data as $prayer) { $prayers[] = $prayer->global_prayer->title; }
      return $prayers;
    }
    
  }
?>