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
    
    public function save_data($data); 
    public function get_data();         
    public function expire_cache();
    public function is_cache_expired();    
  }
  
?>