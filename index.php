<?php

/* *******************************************
 // This is a demo file to show usage.
 //
 // @package TheCity
 // @author Wes Hays <wes@onthecity.org>
 ******************************************* */

require_once 'lib/the_city.php';

// Initalize

// First param is your church's subdomain key.
// Second param is whether or not to cache the data.
$the_city = new TheCity('vintage21', true);
$the_city->add_url_params('wp=1');


// Set group nickname to pull plaza items for.
// http://helpdesk.onthecity.org/entries/422776-group-nickname
$the_city->set_group_nickname('@v21west');


// Load Topics
$array_of_topic_titles = $the_city->topics()->titles();

// by default will grab 10 topics.
$topics = $the_city->topics();

// limit the amount of topics fetched from The City.
$topics = $the_city->topics(3);

// Get topic.
$topic = $topics->select(2);

// Get count.
$topic_count = $topics->size();

// Load Events
$array_of_event_titles = $the_city->events()->titles();

// by default will grab 10 events.
$events = $the_city->events();

// limit the amount of events fetched from The City  
$events = $the_city->events(3);

// Get event.
$event = $events->select(2);

// Get count.
$event_count = $events->size();


// Load Prayers
$array_of_prayer_titles = $the_city->prayers()->titles();

// by default will grab 10 prayers.
$prayers = $the_city->prayers();

// limit the amount of prayers fetched from The City  
$rayers = $the_city->prayers(3);

// Get prayer
$prayer = $prayers->select(2);

// Get count.
$prayer_count = $prayers->size();


// Load Needs
$array_of_need_titles = $the_city->prayers()->titles();

// by default will grab 10 needs
$needs = $the_city->needs();

// limit the amount of needs fetched from The City   
$needs = $the_city->needs(3);

// Get needs
$need = $needs->select(2);

// Get count.
$need_count = $needs->size();


// Albums
$array_of_album_titles = $the_city->albums()->titles();

// by default will grab 10 albums
$albums = $the_city->albums();

// limit the amount of albums fetched from The City  
$albums = $the_city->albums(3);

// Get event
$album = $albums->select(2);

// Get count.
$album_count = $albums->size();



?>