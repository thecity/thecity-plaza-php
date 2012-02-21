<?php

  /** 
   * Project:    Plaza-PHP
   * File:       topics.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/plaza-php
   * @version 0.1
   * @package TheCity
   */


  /** 
   * This class is a wrapper for the topics page.
   *
   * @package TheCity
   */
  class Topics extends Plaza {

    // Holds the data
    private $json_data = '';


    /**
     *  Constructor.
     *
     * @param TopicsLoader $loader The object that loaded the data.
     */
    public function __construct($loader) {
      parent::__construct();
      $this->json_data = $loader->load_feed();
    }
    
    
    /**
     *  All the public topics on the Plaza.
     *
     *  @return array of topics
     */
    public function all_titles() {
      $topics = array();
      foreach ($this->json_data as $topic) { $topics[] = $topic->global_topic->title; }
      return $topics;
    }
    
    
    /**
     * Get the specified topic.
     *
     * @param index The index of the topic to get all the information for.
     *
     * @return Topic
     */
    public function get_topic($index) {
      return new Topic( $this->json_data[$index]->global_topic );      
    }
    
  }
?>