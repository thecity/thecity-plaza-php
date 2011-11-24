<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the TopicsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   
   $jc = new JsonCache('livingstones');
   
   $save = $jc->save_data('hello world');
   if( $save === true) {
     echo "GOOD";
   } else {
     echo "BAD: $save";
   }
  
?>