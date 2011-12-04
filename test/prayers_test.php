<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the PrayersLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   $subdomain = 'livingstones';
   $cacher = new JsonCache($subdomain);

   $loader = new PrayersLoader($subdomain, $cacher);
   
   $prayers = new Prayers($loader);
   
   print_r( $prayers->all() );

?>