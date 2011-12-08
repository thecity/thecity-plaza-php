<?php

/* *******************************************
 # This is a demo file to show usage.
 #
 # @package OnTheCity
 # @author Wes Hays <weshays@gbdev.com>
 ******************************************* */

  require_once 'lib/on_the_city.php';
  
  $on_the_city = new OnTheCity('livingstones');

  // $topics = $on_the_city->topics();  
  // print_r( $topics->all_titles() );  
  // print_r( $topics->get_topic(2) );
  
  // $needs = $on_the_city->needs();  
  // print_r( $needs->all_titles() );  
  // print_r( $needs->get_need(2) );
  
  // $prayers = $on_the_city->prayers();  
  // print_r( $prayers->all_titles() );  
  // print_r( $prayers->get_prayer(2) );
  
  $events = $on_the_city->events();  
  print_r( $events->all_titles() );  
  print_r( $events->get_event(2) );
?>