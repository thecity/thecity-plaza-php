<?php

/* *******************************************
 # This is a demo file to show usage.
 #
 # @package OnTheCity
 # @author Wes Hays <weshays@gbdev.com>
 ******************************************* */

  require_once 'lib/on_the_city.php';
  
  $on_the_city = new OnTheCity('livingstones');

  //print_r( $on_the_city->topics() );
  
  $on_the_city->albums();
?>