<?php

class Eventitem {
    private $eventName;
    private $eventDate;
    private $eventDesc;
    private $eventPrice;
    
    
    function __construct($eventName, $eventDate, $eventDesc, $eventPrice) {
        $this->eventName = $eventName;
        $this->eventDate = $eventDate;
        $this->eventDesc = $eventDesc;
        $this->eventPrice = $eventPrice;
    }
    
    
    function set_name($eventName) {
        $this->eventName = $eventName;
    }
    function get_name() {
        return $this->eventName;
    }
    
    
    function set_date($eventDate) {
        $this->eventDate = $eventDate;
    }
    function get_date() {
        return $this->eventDate;
    }
    
    
    function set_desc($eventDesc) {
        $this->eventDesc = $eventDesc;
    }
    function get_desc() {
        return $this->eventDesc;
    }
    
    
    function set_price($eventPrice) {
        $this->eventPrice = $eventPrice;
    }
    function get_price() {
        return $this->eventPrice;
    }
}

?>