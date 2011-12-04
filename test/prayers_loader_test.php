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
     }

     function tearDown() {
     }
     
     function testPrayersLoaderNew() {
       $this->assertNotNull( new PrayersLoader('somechurch') );
     }
   }
  
  
?>