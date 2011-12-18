<?php

  /** 
   * Project:    OnTheCity API 
   * File:       auto_load.php
   *
   * The AutoLoader used to include libraries needed when requested.
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


   /**
    * The path to the lib directory.
    */
  define('ONTHECITY_LIB_DIR', dirname(__FILE__));
  
  /**
   * The path to the storage directory that will be used for caching data to disk.
   */
  define('ONTHECITY_STORAGE_DIR', dirname(__FILE__) . '/../storage/');


  /** 
   * This class auto loads objects needed when requested.
   *
   * @package OnTheCity
   */
  class OnTheCityClassAutoloader {
    
    /**
     * Registers this class to be called if a requested object does not exist.
     */
    function __construct() {   
      spl_autoload_register(array($this, 'loader'));
    }
    
    
    /**
     * @ignore
     */
    private function loader($class) {  
      $loaders_path = ONTHECITY_LIB_DIR . '/loaders/';
      $cache_path = ONTHECITY_LIB_DIR .'/cachers/';
      $cache_db_path = ONTHECITY_LIB_DIR .'/cachers/db/';
      $cache_file_path = ONTHECITY_LIB_DIR . '/cachers/file/';
      $plaza_file_path = ONTHECITY_LIB_DIR . '/plaza/';

      $file_name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class));
      if(file_exists($loaders_path . $file_name . '.php')) { require_once($loaders_path . $file_name . '.php'); }
      if(file_exists($cache_path . $file_name . '.php')) { require_once($cache_path . $file_name . '.php'); }
      if(file_exists($cache_db_path . $file_name . '.php')) { require_once($cache_db_path . $file_name . '.php'); }
      if(file_exists($cache_file_path . $file_name . '.php')) { require_once($cache_file_path . $file_name . '.php'); }
      if(file_exists($plaza_file_path . $file_name . '.php')) { require_once($plaza_file_path . $file_name . '.php'); }
    }
  }
  
  
  $autoloader = new OnTheCityClassAutoloader();

?>