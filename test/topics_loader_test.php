<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the TopicsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   class TestTopicsLoader extends UnitTestCase {
     function setUp() {
       // $subdomain = 'livingstones';
       // $cacher = new JsonCache($subdomain);
       // $loader = new TopicsLoader($subdomain, $cacher);
       // $topics = new Topics($loader);
     }

     function tearDown() {
     }
     
     function testTopicsLoaderNew() {
       $this->assertNotNull( new TopicsLoader('somechurch') );
       // print_r( $topics->all() );
     }
   }
  
  
?>