<?php

  /** 
  * Project:    OnTheCity API 
  * File:       topics_loader.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class loads the Plaza topics for the subdomain.
   *
   * @package OnTheCity
   */
  class TopicsLoader {

    // Data used to capture the contents of the tag.
    private $json_data = '';
    
    // The URL to load the topics from.
    private $url = '';


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     */
    public function __construct($subdomain) {
      $this->url = "http://$subdomain.onthecity.org/plaza/topics?format=json";      
    }
    
  
    /**
     *  Loads all the topics on the Plaza for the subdomain.
     */  
    public function load_feed() {
      $json = file_get_contents($this->url); 
      $this->json_data = json_decode($json);  
    }  
    
    
    /**
     *  All the public topics on the Plaza.
     *  @return array of topics
     */
    public function all_topics() {
      $topics = array();
      foreach ($this->json_data as $topic) { $topics[] = $topic->global_topic->title; }
      return $topics;
    }

  }

?>