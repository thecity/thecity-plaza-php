<?php

  /** 
  * Project:    OnTheCity API 
  * File:       plaza.php
   *
   * @author Wes Hays <weshays@gbdev.com> 
   * @link https://github.com/weshays/onthecity-api-php
   * @version 1.0a
   * @package OnTheCity
   */


  /** 
   * This is the generic class the different Plaza attributes 
   * (topics, prayers, needs, events, albums) will inherit from.
   *
   * @package OnTheCity
   */
  class Plaza {

    /**
     *  Generic contractor.
     */
    public function __construct() {
      // Do nothing
    }
    
    
    /**
     *  Clean text to remove html tags and other misc characters.
     */
    protected function clean_text($text) {
      $text = strip_tags( $text );
      //$text = iconv("UTF-8", "ISO-8859-1", $text);
      return $text;
    }
    
  }
?>