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
     * @return array of data for the event.
     * array(
     *  'title' => '...',
     *  'created_at => '...',
     *  'who_posted' => '...',
     *  'content' => '...',
     *  'event_responses' => array( 
     *    array(
     *      'created_at' => '...',
     *      'who_posted' => '...',
     *      'attending' => '...',
     *      'total_coming' => '...'
     *    )
     * )
     */
    public function get_event($index) {
      $revent = array();
      $revent['title'] = $this->json_data[$index]->global_event->title;   
      $revent['created_at'] = $this->json_data[$index]->global_event->created_at;
      $revent['who_posted'] = $this->json_data[$index]->global_event->user->long_name;
      $revent['content'] = $this->clean_text( $this->json_data[$index]->global_event->body );
      
      $revent['event_responses'] = array();
      foreach ($this->json_data[$index]->global_event->event_responses as $event_response) { 
        $name = 'Unknown';
        if( !is_null($event_response->user) ) {
          $name = $event_response->user->long_name;
        } 
        else if( !is_null($event_response->facebook_user) ) {
          $name = $event_response->facebook_user->first.' '.$event_response->facebook_user->last;
        }
        
        $revent['event_responses'][] = array(
          'created_at'   => $event_response->created_at,
          'who_posted'   => $name,
          'attending'    => $event_response->attending,
          'total_coming' => $event_response->total_coming
        );
      }
       
      return $revent;
    }
  }
?>