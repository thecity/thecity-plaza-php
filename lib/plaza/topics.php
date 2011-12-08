<?php

  /** 
  * Project:    OnTheCity API 
  * File:       topics.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class is a wrapper for the topics page.
   *
   * @package OnTheCity
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
    public function get_topic($index) {
      $rtopic = array();
      $rtopic['title'] = $this->json_data[$index]->global_topic->title;   
      $rtopic['created_at'] = $this->json_data[$index]->global_topic->created_at;
      $rtopic['who_posted'] = $this->json_data[$index]->global_topic->user->long_name;
      $rtopic['content'] = $this->clean_text( $this->json_data[$index]->global_topic->body );
      
      $rtopic['posts'] = array();
      foreach ($this->json_data[$index]->global_topic->posts as $post) { 
        $rtopic['posts'][] = array(
          'created_at' => $post->created_at,
          'who_posted' => $post->user->long_name,
          'content'    => $this->clean_text( $post->body ),
        );
      }
       
      return $rtopic;
    }
    
  }
?>