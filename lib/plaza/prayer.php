<?php

  /** 
   * Project:    Plaza-PHP
   * File:       prayer.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/plaza-php
   * @version 0.1
   * @package TheCity
   */


  /** 
   * A prayer instance.  This object is immutable.
   *
   * @package TheCity
   */
  class Prayer extends Plaza {

    /**
     * Constructor.
     *
     * @param array $data a Hash containing all the data to initialize this prayer.
     */
    public function __construct($data) {
      parent::__construct($data);
    }
    
    
    /**
     * @return The responses to the prayer.
     */
    public function posts() {
      $rposts = array();
      foreach ($this->data->prayer_responses as $prayer_response) { 
        $name = 'Unknown';
        if( !is_null($prayer_response->user) ) {
          $name = $prayer_response->user->long_name;
        } 
        else if( !is_null($prayer_response->facebook_user) ) {
          $name = $prayer_response->facebook_user->first.' '.$prayer_response->facebook_user->last;
        }
        
        $rposts[] = array(
          'created_at' => $prayer_response->created_at,
          'who_posted' => $name,
          'content'    => $this->clean_text( $prayer_response->body )
        );
      }
       
      return $rposts;
    }
    
  }
?>