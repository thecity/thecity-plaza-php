<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the AlbumsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   $subdomain = 'livingstones';
   $cacher = new JsonCache($subdomain);

   $loader = new AlbumsLoader($subdomain, $cacher);
   
   $albums = new Albums($loader);
   
   print_r( $albums->all() );

?>