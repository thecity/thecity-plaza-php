<?php
 
  require_once 'helper.php';

  /** 
   * These are the tests for the TopicsLoader class.
   *
   * @package OnTheCity
   * @author Wes Hays <weshays@gbdev.com>
   */
   
   
   $jc = new JsonCache('livingstones');
   
   $save = $jc->save_data('dogman', 'helloworld', '2011-12-01');
   echo $save === true ? 'Good' : "Bad: #save";
   
   echo $jc->get_data('dogman');
?>