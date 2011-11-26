<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the TopicsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   
   $jc = new JsonCache('livingstones');
   
   $save = $jc->save_data('dogman', 'helloworld', 60);
   echo $save === true ? 'Good' : "Bad: #save";
   
   echo $jc->get_data('dogman');
?>