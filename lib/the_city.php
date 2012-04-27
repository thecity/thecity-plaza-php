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
   * Includes the autoloader.
   */
  include_once(dirname(__FILE__) . '/auto_load.php');


  /** 
   * This class is meant to be a wrapper for the OnTheCity.org API.
   *
   * @package TheCity
   */
  class TheCity {

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


    // The last number of albums requested.
    private $albums_num_requested = 0;
    
    // The last number of events requested.
    private $events_num_requested = 0;
    
    // The last number of needs requested.
    private $needs_num_requested = 0;
    
    // The last number of prayers requested.
    private $prayers_num_requested = 0;
    
    // The last number of topics requested.
    private $topics_num_requested = 0;


    // The object to store and load the cache.
    private $cacher;



    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * @param boolean $cache_data Cache the data. Default true.
     * @param CacheInterface $cacher The object that will store and load the cache. Default type JsonCache.
     */
    public function __construct($subdomain, $cache_data = true, $cacher = null) {
      $this->subdomain = $subdomain;
      if($cache_data === true) {
        $this->cacher = empty($cacher) ? new JsonCache($subdomain) : $cacher;
      }
    }
    
    
    /**
     * Shows all the topics posted on the Plaza.
     *
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     *
     * @return array of all the topics posted on the Plaza.
     */
    public function topics($num_per_page = 10) {
      if( $this->topics_num_requested == $num_per_page && !is_null($this->topics) ) { return $this->topics; }
      $this->topics_num_requested = $num_per_page;
      $loader = new TopicsLoader( $this->subdomain, $num_per_page, $this->cacher );
      $this->topics = new Topics( $loader );
      return $this->topics;
    }
    

    /**
     * Shows all the events posted on the Plaza.
     *
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     *
     * @return array of all the events posted on the Plaza.
     */
    public function events($num_per_page = 10) {
      if( $this->events_num_requested == $num_per_page && !is_null($this->events) ) { return $this->events; }
      $this->events_num_requested = $num_per_page;
      $loader = new EventsLoader( $this->subdomain, $num_per_page, $this->cacher );
      $this->events = new Events( $loader );
      return $this->events;
    }    
 
    
    /**
     * Shows all the prayers posted on the Plaza.
     *
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     *
     * @return array of all the prayers posted on the Plaza.
     */
    public function prayers($num_per_page = 10) {
      if( $this->prayers_num_requested == $num_per_page && !is_null($this->prayers) ) { return $this->prayers; }
      $this->prayers_num_requested = $num_per_page;
      $loader = new PrayersLoader( $this->subdomain, $num_per_page, $this->cacher );
      $this->prayers = new Prayers( $loader );
      return $this->prayers;
    }
    
    /**
     * Shows all the needs posted on the Plaza.
     *
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     *
     * @return array of all the needs posted on the Plaza.
     */
    public function needs($num_per_page = 10) {
      if( $this->needs_num_requested == $num_per_page && !is_null($this->needs) ) { return $this->needs; }
      $this->needs_num_requested = $num_per_page;
      $loader = new NeedsLoader( $this->subdomain, $num_per_page, $this->cacher );
      $this->needs = new Needs( $loader );
      return $this->needs;
    }
    

    /**
     * Shows all the events posted on the Plaza.
     *
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     *
     * @return array of all the events posted on the Plaza.
     */
    public function albums($num_per_page = 10) {
      if( $this->albums_num_requested == $num_per_page && !is_null($this->albums) ) { return $this->albums; }
      $this->albums_num_requested = $num_per_page;
      $loader = new AlbumsLoader( $this->subdomain, $num_per_page, $this->cacher );
      $this->albums = new Albums( $loader );
      return $this->albums;
    }
    

  }

?>