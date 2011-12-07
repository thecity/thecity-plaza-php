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
     }

     function tearDown() {
     }
     
     function testEventsLoaderNew() {
       $this->assertNotNull( new EventsLoader('somechurch') );
     }
   }
  
  
?>