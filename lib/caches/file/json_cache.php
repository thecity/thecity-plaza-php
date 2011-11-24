<?php

  include_once(ONTHECITY_LIB_DIR . '/caches/cache_interface.php');


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
    
    // The subdomain directory path to save cache information
    private $cache_dir;
    
    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * @param array $options.
     * 
     */
    public function __construct($subdomain) {
      $this->subdomain = $subdomain;
      $this->cache_dir = ONTHECITY_STORAGE_DIR . $this->subdomain . '/';
    }
    
    
    /**
     *  Save data to the cache.
     *
     * @param string $key The key to use to save the cache.
     * @param string $data The JSON data to be saved.
     * @param string $expire_on The datetime to expire the cache.
     *
     * @return mixed Returns true on success or a string error message on false.
     */
    public function save_data($key, $data, $expire_on = nil) {
      $this->create_cache_directory_if_needed();
      
      $filename = "$key.json.cache";
      
      if (!$handle = fopen($this->cache_dir . $filename, 'w')) {
        return "Cannot open file ($filename)";
      }

      if (fwrite($handle, $data) === FALSE) {
        return "Cannot write to file ($filename)";
      }

      fclose($handle);

      return true;
    } 
    
    
    /**
     * Get the data from the cache.
     *
     * @param string $key The key to use to get the cache.
     */
    public function get_data($key) {
      $filename = "$key.json.cache";
      $handle = fopen($this->cache_dir . $filename, 'r');
      $contents = stream_get_contents($handle);
      fclose($handle);
      return $contents;
    }
    
    
    /**
     * Expire the cache.
     *
     * @param string $key The key to use to expire the cache.
     */
    public function expire_cache($key) {
      
    }
    
    
    /**
     * Check if the cache has expired.
     *
     * @param string $key The key to use to check if the cache has expired.
     */
    public function is_cache_expired($key) {
      
    }
    
    
    /**
     * Ignore
     */
    private function create_cache_directory_if_needed() {
      if(!file_exists($this->cache_dir )){
        if(!mkdir($this->cache_dir)) {
          throw new Exception('Failed to create cache directory');
        }
      }
    }
    
  }
?>
