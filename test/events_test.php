<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the EventsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   $subdomain = 'livingstones';
   $cacher = new JsonCache($subdomain);

   $loader = new EventsLoader($subdomain, $cacher);
   
   $events = new Events($loader);
   
   print_r( $events->all_events() );

?>