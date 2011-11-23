<?php

  function __autoload($class) {    
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = dirname(__FILE__) . $ds;
    $loaders_path = $base_dir .'loaders' . $ds;
    $cache_db_path = $base_dir .'caches' . $ds . 'db' . $ds;
    $cache_file_path = $base_dir .'caches' . $ds . 'file' . $ds;

    $file_name = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $class));
    if(file_exists($loaders_path . $file_name . '.php')) { require_once($loaders_path . $file_name . '.php'); }
    if(file_exists($cache_db_path . $file_name . '.php')) { require_once($cache_db_path . $file_name . '.php'); }
    if(file_exists($cache_file_path . $file_name . '.php')) { require_once($cache_file_path . $file_name . '.php'); }
  }

?>