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
  class Prayers extends Plaza  {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param PrayersLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      parent::__construct();
      $this->json_data = $loader->load_feed();
    }
    
    
    /**
     *  All the public prayers on the Plaza.
     *
     *  @return array of prayers.
     */
    public function all_titles() {
      $prayers = array();
      foreach ($this->json_data as $prayer) { $prayers[] = $prayer->global_prayer->title; }
      return $prayers;
    }
    
    
    /**
     * Get the specified prayer.
     *
     * @param index The index of the prayer to get all the information for.
     *
     * @return array of data for the prayer.
     * array(
     *  'title' => '...',
     *  'created_at => '...',
     *  'who_posted' => '...',
     *  'content' => '...',
     *  'prayer_responses' => array( 
     *    array(
     *      'created_at' => '...',
     *      'who_posted' => '...',
     *      'content' => '...'
     *    )
     * )
     */
    public function get_prayer($index) {
      $rprayer = array();
      $rprayer['title'] = $this->json_data[$index]->global_prayer->title;   
      $rprayer['created_at'] = $this->json_data[$index]->global_prayer->created_at;
      $rprayer['who_posted'] = $this->json_data[$index]->global_prayer->user->long_name;
      $rprayer['content'] = $this->clean_text( $this->json_data[$index]->global_prayer->body );
      
      $rprayer['prayer_responses'] = array();
      foreach ($this->json_data[$index]->global_prayer->prayer_responses as $prayer_response) { 
        $name = 'Unknown';
        if( !is_null($prayer_response->user) ) {
          $name = $prayer_response->user->long_name;
        } 
        else if( !is_null($prayer_response->facebook_user) ) {
          $name = $prayer_response->facebook_user->first.' '.$prayer_response->facebook_user->last;
        }
        
        $rprayer['prayer_responses'][] = array(
          'created_at' => $prayer_response->created_at,
          'who_posted' => $name,
          'content'    => $this->clean_text( $prayer_response->body ),
        );
      }
       
      return $rprayer;
    }
    
  }
?>