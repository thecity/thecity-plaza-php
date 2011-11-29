<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the NeedsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   $subdomain = 'livingstones';
   $cacher = new JsonCache($subdomain);

   $loader = new NeedsLoader($subdomain, $cacher);
   
   $needs = new Needs($loader);
   
   print_r( $needs->all_needs() );

?>