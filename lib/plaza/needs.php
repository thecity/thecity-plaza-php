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
     * Get the 
     *
     * @param index The index of the topic to get all the information for.
     *
     * @return array of data for the topic.
     * array(
     *  'title' => '...',
     *  'created_at => '...',
     *  'who_posted' => '...',
     *  'content' => '...',
     *  'posts' => array( 
     *    array(
     *      'created_at' => '...',
     *      'who_posted' => '...',
     *      'content' => '...'
     *    )
     * )
     */
    public function get_need($index) {
      $rneed = array();
      $rneed['title'] = $this->json_data[$index]->global_need->title;   
      $rneed['created_at'] = $this->json_data[$index]->global_need->created_at;
      $rneed['who_posted'] = $this->json_data[$index]->global_need->user->long_name;
      $rneed['content'] = $this->clean_text( $this->json_data[$index]->global_need->body );
      
      $rneed['need_responses'] = array();
      foreach ($this->json_data[$index]->global_need->need_responses as $need_response) { 
        $rneed['need_responses'][] = array(
          'created_at' => $need_response->created_at,
          'who_posted' => $need_response->user->long_name,
          'content'    => $this->clean_text( $need_response->body ),
        );
      }
       
      return $rneed;
    }
    
  }
?>