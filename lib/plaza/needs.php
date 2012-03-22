<?php

  /** 
   * Project:    Plaza-PHP
   * File:       needs.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/plaza-php
   * @version 0.1
   * @package TheCity
   */


  /** 
   * This class is a wrapper for the needs page.
   *
   * @package TheCity
   */
  class Needs extends Plaza  {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param NeedsLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      parent::__construct();
      $this->json_data = $loader->load_feed();
    }
    
    
    /**
     *  All the public needs on the Plaza.
     *
     *  @return array of needs.
     */
    public function all_titles() {
      $needs = array();
      foreach ($this->json_data as $need) { $needs[] = $need->global_need->title; }
      return $needs;
    }
    
    
    /**
     * Get the specified need.
     *
     * @param index The index of the need to get all the information for.
     *
     * @return Need
     */
    public function select($index) {
      return new Need( $this->json_data[$index]->global_need );
    }
    
  }
?>