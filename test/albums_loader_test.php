<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the AlbumsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   class TestAlbumsLoader extends UnitTestCase {
     function setUp() {
       // $subdomain = 'livingstones';
       // $cacher = new JsonCache($subdomain);
       // $loader = new AlbumsLoader($subdomain, $cacher);
       // $albums = new Albums($loader);
     }

     function tearDown() {
     }
     
     function testAlbumsLoaderNew() {
       $this->assertNotNull( new AlbumsLoader('somechurch') );  
       // print_r( $albums->all() );
     }
   }
  
  
?>