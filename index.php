<?php

/* *******************************************
 # This is a demo file to show usage.
 #
 # @package TheCity
 # @author Wes Hays <wes@onthecity.org>
 ******************************************* */

  require_once 'lib/the_city.php';
  
  $the_city = new TheCity('livingstones');

  // $topics = $the_city->topics();  
  // print_r( $topics->all_titles() );  
  // $topic = $topics->select(2);
  // echo $topic->title() . "\n";
  // echo $topic->created_at() . "\n";
  // echo $topic->who_posted() . "\n";
  // echo $topic->content() . "\n";
  // print_r($topic->posts());
  
  
  $needs = $the_city->needs(3);  
  print_r( $needs->all_titles() );  

  $needs = $the_city->needs(5);  
  print_r( $needs->all_titles() );  

  $topics = $the_city->topics(5);  
  print_r( $topics->all_titles() );    

  $topics = $the_city->topics(7);  
  print_r( $topics->all_titles() );    

  #print_r( $needs->select(2) );
  
  // $prayers = $the_city->prayers();  
  // print_r( $prayers->all_titles() );  
  // print_r( $prayers->select(2) );
  
  // $events = $the_city->events();   
  // print_r( $events->all_titles() );  
  // print_r( $events->select(2) );
  // $event = $events->select(2);
  // echo "Created at: " . $event->created_at() . "\n";
  // echo "Starting at: " . $event->starting_at() . "\n";
  // echo "Ending at: " . $event->ending_at() . "\n";
  // echo "Who posted: " . $event->who_posted() . "\n"; 

?>