<?php

  /** 
   * Project:    Plaza-PHP
   * File:       base_loader.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/thecity-plaza-php
   * @package TheCity
   */


  /** 
   * This class has the defaults for the loaders.
   *
   * @package TheCity
   */
  class BaseLoader {

    public $class_key = 'NOT_SET';
    
    // The URL to load the albumns from.
    public $url = '';
    
    // The object to store and load the cache.
    public $cacher;

    /**
     *  Generic constructor.
     */
    public function __construct() {
      // Do nothing
    }


    /**
     * Cleans the group nickname to make sure it is valid.
     *
     * @return string The sanitized group nickname.
     */
    public function clean_group_nickname($group_name) {
      $nickname = $group_name == null ? '' : $group_name;
      $nickname = strip_tags($nickname);
      $nickname = strtolower($nickname);
      return trim($nickname);      
    }


    /**
     * Adds additional url params to be sent to the server.  These may be used by the system
     * now or in the future.
     *
     * @param string $url_params The additional params to send to the server.
     */
    public function add_url_params($url_params) {
      $this->other_url_params = $url_params;
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

      $url_to_use = $this->url;
      if( !empty($this->other_url_params) ) {
        $url_to_use = $this->url .'&'.$this->other_url_params;
      }

      $json = file_get_contents($url_to_use); 
      $data = json_decode($json);    
     
      if( !is_null($this->cacher) ) { 
        $this->cacher->save_data($this->class_key, $data);
      }      

      return $data;
    }      

  }

  ?>