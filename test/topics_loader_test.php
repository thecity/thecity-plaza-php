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
     }

     function tearDown() {
     }
     
     function testTopicsLoaderNew() {
       $this->assertNotNull( new TopicsLoader('somechurch') );
     }
   }
  
  
?>