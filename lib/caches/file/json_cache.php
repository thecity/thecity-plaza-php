<?php

  include_once(dirname(__FILE__) . '/../cache_interface.php');


  /** 
  * Project:    OnTheCity API 
  * File:       json_cache.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class caches the data in a json
   *
   * @package OnTheCity
   */
  class JsonCache implements CacheInterface {
    
    // The subdomain to load and store the data for.
    private $subdomain;
    
    
    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * 
     */
    public function __construct($subdomain) {
      $this->subdomain = $subdomain;
    }
    
    
    public function save_data($data) {
      
    } 
    
    public function get_data() {
      
    }
    
    public function expire_cache() {
      
    }
    
    public function is_cache_expired() {
      
    }
    
  }
?>
