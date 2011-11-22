<?php

  require_once 'topics_loader.php';

  /** 
   * Project:    OnTheCity API
   * File:       on_the_city.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */

  /** 
   * This class is meant to be a wrapper for the OnTheCity.org API.
   *
   * @package OnTheCity
   */
  class OnTheCity {

    // The subdomain to load the data for.
    private $subdomain;

    private $topics;


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     */
    public function __construct($subdomain) {
      $this->topics = new TopicsLoader($subdomain);
      $this->topics->load_feed();
    }
    
    
    /**
     *  Shows all the topics posted on the Plaza.
     *
     * @return array of all the topics posted on the Plaza.
     */
    public function topics() {
      return $this->topics->all_topics();
    }
      
  }

?>