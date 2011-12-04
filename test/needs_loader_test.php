<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the NeedsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   class TestNeedsLoader extends UnitTestCase {
     function setUp() {
     }

     function tearDown() {
     }
     
     function testNeedsLoaderNew() {
       $this->assertNotNull( new NeedsLoader('somechurch') );
     }
   }
  
  
?>