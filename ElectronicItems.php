<?php

include 'Console.php';
include 'Microwave.php';
include 'Television.php';
include 'Console.php';
// require_once 'ElectronicItems.php';

ini_set('memory_limit', '44M');

class ElectronicItems {

    public $price;
    public $wired;
    public $extra;
    
    private $items = array();
    
    public function __construct (array $items){

        $this->items = $items;

    }
    
    function __destruct() {
        echo "The fruit is {$this->extra}.";
      }

    public function getPrice() { 
        return $this->price;
    } 

    public function getWired() { 
        return $this->wired;
     }

    public function setPrice($price) { 
        $this->price = $price;
    }

    public function setWired($wired) { 
        $this->wired = $wired; 
    }

    public function maxExtras() {
       return 0;
    }

    public function addItem($item){
        array_push($items, $item);
    }


    public function getItems() {
        return $this->items;
    }


    public function getSize() {
        return count($this->items);
    }

    public function addExtra($item){
        if($this->extra->getSize() < $this->maxExtras()) {
            $this->extra->addItem($item);
        }
    }

    
    /**
     * Return the items depending on the sorting type requested
     * 
     * $return array
     */
    // public function getSortedItems($type){
        
    //     $sorted = array();

    //     foreach ($this->items as $item) {

    //         $sorted[($item->price * 100)] = $item;

    //     }

    //     return ksort($sorted, SORT_NUMERIC);

    // }

    // /**
    //  * 
    //  * @param string $type
    //  * @return array
    //  */

    // public function getItemsByType($type){

    //     if(in_array($type, ElectronicItem::$types)){

    //         $callback = function($item) use ($type){

    //             return $item->type == $type;

    //         };

    //         $items = array_filter($this->items, $callback);

    //     }
        
    //     return false;

    // }


}