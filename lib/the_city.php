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
     * @return array of all the topics posted on the Plaza.
     */
    public function topics() {
      if( !is_null($this->topics) ) { return $this->topics; }
      $loader = new TopicsLoader( $this->subdomain, $this->cacher );
      $this->topics = new Topics( $loader );
      return $this->topics;
    }
    

    /**
     * Shows all the events posted on the Plaza.
     *
     * @return array of all the events posted on the Plaza.
     */
    public function events() {
      if( !is_null($this->events) ) { return $this->events; }
      $loader = new EventsLoader( $this->subdomain, $this->cacher );
      $this->events = new Events( $loader );
      return $this->events;
    }    
 
    
    /**
     * Shows all the prayers posted on the Plaza.
     *
     * @return array of all the prayers posted on the Plaza.
     */
    public function prayers() {
      if( !is_null($this->prayers) ) { return $this->prayers; }
      $loader = new PrayersLoader( $this->subdomain, $this->cacher );
      $this->prayers = new Prayers( $loader );
      return $this->prayers;
    }
    
    /**
     * Shows all the needs posted on the Plaza.
     *
     * @return array of all the needs posted on the Plaza.
     */
    public function needs() {
      if( !is_null($this->needs) ) { return $this->needs; }
      $loader = new NeedsLoader( $this->subdomain, $this->cacher );
      $this->needs = new Needs( $loader );
      return $this->needs;
    }
    

    /**
     * Shows all the events posted on the Plaza.
     *
     * @return array of all the events posted on the Plaza.
     */
    public function albums() {
      if( !is_null($this->albums) ) { return $this->albums; }
      $loader = new AlbumsLoader( $this->subdomain, $this->cacher );
      $this->albums = new Albums( $loader );
      return $this->albums;
    }
    

  }

?>