<?php

  /** 
  * Project:    OnTheCity API 
  * File:       prayers_loader.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This class loads the Plaza prayers for the subdomain.
   *
   * @package OnTheCity
   */
  class PrayersLoader {

    private $class_key = 'topics';
    
    // The URL to load the prayers from.
    private $url = '';
    
    // The object to store and load the cache.
    private $cacher;


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     */
    public function __construct($subdomain) {
      $this->url = "http://$subdomain.onthecity.org/plaza/prayers?format=json";      
    }
    
    
    /**
     *  Loads all the prayers on the Plaza for the subdomain.
     *
     * @return JSON The data loaded in a JSON object.
     */  
    public function load_feed() {
      if( !is_null($this->cacher) && !$this->cacher->is_cache_expired( $this->class_key ))  { 
        return $this->cacher->get_data( $this->class_key ); 
      }
        
      $json = file_get_contents($this->url); 
      $data = json_decode($json);    
         
      $this->cache_data($data);       
      
      return $data;
    }
    
    
    /**
     * Ignore
     */
    private function cache_data($data) {
      if( !is_null($this->cacher) ) { 
        $this->cacher->save_data($this->class_key, $data);
      }
    }
    
  }
?>