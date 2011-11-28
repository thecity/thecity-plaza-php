<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the TopicsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   $subdomain = 'livingstones';
   $cacher = new JsonCache($subdomain);

   $loader = new TopicsLoader($subdomain, $cacher);
   
   $topics = new Topics($loader);
   
   print_r( $topics->all_topics() );

?>