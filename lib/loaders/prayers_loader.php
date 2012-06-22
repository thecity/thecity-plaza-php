<?php

  /** 
   * Project:    Plaza-PHP
   * File:       prayers_loader.php
   *
   * @author Wes Hays <wes@onthecity.org> 
   * @link https://github.com/thecity/thecity-plaza-php
   * @package TheCity
   */


  /** 
   * This class loads the Plaza prayers for the subdomain.
   *
   * @package TheCity
   */
  class PrayersLoader extends BaseLoader {

    private $class_key = 'prayers';
    
    // The URL to load the prayers from.
    private $url = '';
    
    // The object to store and load the cache.
    private $cacher;


    /**
     *  Constructor.
     *
     * @param string $subdomain The church subdomain.
     * @param integer $num_per_page The number of items to show.  Max is 15. Default is 10.
     * @param CacheInterface The cacher to be used to cache data.
     * @param string $group_nickname (optional) The group to get plaza items for.
     */
    public function __construct($subdomain, $num_per_page = 10, $cacher = null, $group_nickname = null) {
      parent::__construct();
      $group_nickname = $this->clean_group_nickname($group_nickname);
      $nickname = empty($group_nickname) ? '' : '/'.$group_nickname;
      $this->url = "http://$subdomain.onthecity.org/plaza$nickname/prayers?format=json&per_page=$num_per_page";  
      $this->class_key .= "_$num_per_page"."_$group_nickname"; 
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