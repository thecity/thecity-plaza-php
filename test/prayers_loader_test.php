<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the NeedsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   class TestPrayersLoader extends UnitTestCase {
     function setUp() {
       // $subdomain = 'livingstones';
       // $cacher = new JsonCache($subdomain);
       // $loader = new PrayersLoader($subdomain, $cacher);
       // $prayers = new Prayers($loader);
     }

     function tearDown() {
     }
     
     function testPrayersLoaderNew() {
       $this->assertNotNull( new PrayersLoader('somechurch') );
       // print_r( $prayers->all() );
     }
   }
  
  
?>