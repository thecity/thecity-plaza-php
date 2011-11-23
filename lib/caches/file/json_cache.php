<?php
  include_once('../cache_interface.php')


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


    /**
     *  Constructor.
     *
     * @param array $options The options for the cache.
     * 
     */
    public function __construct($subdomain) {

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
