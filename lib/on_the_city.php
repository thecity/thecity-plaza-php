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
    

  }

?>