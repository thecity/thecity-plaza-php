<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the EventsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   class TestEventsLoader extends UnitTestCase {
     function setUp() {
       // $subdomain = 'livingstones';
       // $cacher = new JsonCache($subdomain);
       // $loader = new EventsLoader($subdomain, $cacher);
       // $events = new Events($loader);
     }

     function tearDown() {
     }
     
     function testEventsLoaderNew() {
       $this->assertNotNull( new EventsLoader('somechurch') );
       //print_r( $events->all() );
     }
   }
  
  
?>