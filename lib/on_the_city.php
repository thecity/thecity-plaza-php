<?php

  include_once('auto_load.php');


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

    // The albums loaded for the subdomain.
    private $albums;
    
    // The events loaded for the subdomain.
    private $events;
    
    // The needs loaded for the subdomain. 
    private $needs;
    
    // The prayers loaded for the subdomain.
    private $prayers;
    
    // The topics loaded for the subdomain. 
    private $topics;

    // The object to store and load the cache.
    private $cacher;


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * @param boolean $cache_data Cache the data. Default true.
     * @param CacheInterface $cacher The object that will store and load the cache. Default type JsonCache.
     */
    public function __construct($subdomain, $cache_data = true, $cacher = '') {
      if($cache_data === true) {
        $this->cacher = empyt($cacher) ? new JsonCache($subdomain) : $cacher;
      }
      
      $this->albums = new AlbumsLoader($subdomain, $this->cacher);
      $this->events = new EventsLoader($subdomain, $this->cacher);
      $this->needs = new NeedsLoader($subdomain, $this->cacher);
      $this->prayers = new PrayersLoader($subdomain, $this->cacher);
      $this->topics = new TopicsLoader($subdomain, $this->cacher);
      
      // $this->topics->load_feed();
    }
    
    
    /**
     * Shows all the topics posted on the Plaza.
     *
     * @return array of all the topics posted on the Plaza.
     */
    public function topics() {
      return $this->topics->all_topics();
    }
    
    public function albums() {
      $albums = new AlbumsLoader('livingstones');
    }
      
  }

?>