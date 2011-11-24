<?php

  /** 
  * Project:    OnTheCity API 
  * File:       cache_interface.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This interface is the standard for all caching objects.
   *
   * @package OnTheCity
   */
  interface CacheInterface {
    
    /**
     *  Constructor.
     *
     * @param array $options The options for the cache.
     * 
     */
    public function __construct($subdomain);


    /**
     *  Save data to the cache.
     *
     * @param string $key The key to use to save the cache.
     * @param string $data The JSON data to be saved.
     * @param string $expire_on The datetime to expire the cache.
     *
     * @return mixed Returns true on success or a string error message on false.
     */
    public function save_data($key, $data, $expire_on = nil);
      
      
    /**
     * Get the data from the cache.
     *
     * @param string $key The key to use to get the cache.
     */  
    public function get_data($key);         
    
    
    /**
     * Expire the cache.
     *
     * @param string $key The key to use to expire the cache.
     */
    public function expire_cache($key);
    
    
    /**
     * Check if the cache has expired.
     *
     * @param string $key The key to use to check if the cache has expired.
     */
    public function is_cache_expired($key);    
  }
  
?>