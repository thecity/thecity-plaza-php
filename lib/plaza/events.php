<?php

  /** 
  * Project:    OnTheCity API 
  * File:       events.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class is a wrapper for the events page.
   *
   * @package OnTheCity
   */
  class Events extends Plaza {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param EventsLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      parent::__construct();
      $this->json_data = $loader->load_feed();
    }

    /**
     *  All the public events on the Plaza.
     *  @return array of events.
     */
    public function all() {
      $events = array();
      foreach ($this->json_data as $event) { $events[] = $event->global_event->title; }
      return $events;
    }
    
  }
?>