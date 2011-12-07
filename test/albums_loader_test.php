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
     }

     function tearDown() {
     }
     
     function testAlbumsLoaderNew() {
       $this->assertNotNull( new AlbumsLoader('somechurch') );
     }
   }
  
  
?>