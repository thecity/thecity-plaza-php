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
     *
     *  @return array of events.
     */
    public function all_titles() {
      $events = array();
      foreach ($this->json_data as $event) { $events[] = $event->global_event->title; }
      return $events;
    }
    
    
    /**
     * Get the specified need.
     *
     * @param index The index of the event to get all the information for.
     *
     * @return Event
     */
    public function get_event($index) {
      return new Event( $this->json_data[$index]->global_event );
    }
  }
?>