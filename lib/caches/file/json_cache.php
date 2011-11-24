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
    
    
    // The base directory path to save all cache information.
    private $base_cache_dir = './storage/';
    
    // The subdomain directory path to save cache information
    private $cache_dir;
    
    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * 
     */
    public function __construct($subdomain) {
      $this->subdomain = $subdomain;
      $this->cache_dir = $this->base_cache_dir . $this->subdomain;
    }
    
    
    public function save_data($data) {
      $this->create_cache_directory_if_needed();
      
      $filename = 'dog.json.cache';
      
      //if (is_writable($filename)) {
        if (!$handle = fopen($filename, 'w')) {
          return "Cannot open file ($filename)";
        }

        // Write $somecontent to our opened file.
        if (fwrite($handle, $data) === FALSE) {
          return "Cannot write to file ($filename)";
        }
  
        fclose($handle);

      // } else {
      //   return "The file $filename is not writable";
      // }
      
      return true;
    } 
    
    public function get_data() {
      
    }
    
    public function expire_cache() {
      
    }
    
    public function is_cache_expired() {
      
    }
    
    
    
    private function create_cache_directory_if_needed() {
      if(!file_exists($this->base_cache_dir)) {
        if(!mkdir($this->cache_dir)) {
          throw new Exception('Failed to create cache directory');
        }
      }
    }
    
  }
?>
