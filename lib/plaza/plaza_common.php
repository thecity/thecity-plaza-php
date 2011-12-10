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
   * This is the generic class to the common Plaza attributes.
   * (topic, prayer, need, event, album) will inherit from.
   *
   * @package OnTheCity
   */
  class PlazaCommon {

    // Holds the data
    protected $data = '';


    /**
     * Constructor.
     *
     * @param array $data a Hash containing all the data to initialize this object.
     */
    public function __construct($data) {
      $this->data = $data;
    }
    
    
    /**
     * @return The title of this plaza item.
     */
    public function title() { 
      return $this->data->title;
    }
    
    
    /**
     * @return When this plaza item was created.
     */
    public function created_at() { 
      return $this->data->created_at;
    }


    /**
     * @return The name of the person who made this plaza item.
     */
    public function who_posted() { 
      return $this->data->user->long_name;
    }
    
    
    /**
     * @return The content of this plaza item.     
     */
    public function content() { 
      return $this->clean_text( $this->data->body );
    }
    
    
    
    /**
     *  Clean text by removing html tags and other special characters.
     *
     * @return Clean text.
     */
    protected function clean_text($text) {
      $text = strip_tags( $text );
      return iconv("UTF-8", "ISO-8859-1//IGNORE", $text);
    }

    
  }
?>