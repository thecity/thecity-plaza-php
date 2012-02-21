<?php

  /** 
   * Project:    Plaza-PHP
   * File:       prayers_loader.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/plaza-php
   * @version 0.1
   * @package TheCity
   */


  /** 
   * This class loads the Plaza prayers for the subdomain.
   *
   * @package TheCity
   */
  class PrayersLoader {

    private $class_key = 'prayers';
    
    // The URL to load the prayers from.
    private $url = '';
    
    // The object to store and load the cache.
    private $cacher;


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * @param CacheInterface The cacher to be used to cache data.
     */
    public function __construct($subdomain, $cacher = null) {
      $this->url = "http://$subdomain.onthecity.org/plaza/prayers.json";      
      if( !is_null($cacher) ) { $this->cacher = $cacher; }  
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
     * @ignore
     */
    private function cache_data($data) {
      if( !is_null($this->cacher) ) { 
        $this->cacher->save_data($this->class_key, $data);
      }
    }
    
  }
?>