<?php

require 'ElectronicItems.php';

 class ElectronicItem {

    public $price;
    public $wired;
    public $extras;


    public function addExtra($item){

        if($this->extras == null) {
            $this->extras = new ElectronicItems(array());
        }

        if(count($this->extras->getItems()) < $this->maxExtras()) {
            $this->extras->addItem($item);
        }
    }

    public function maxExtras() {
       return 0;
    }
    
    public function getPrice() { return $this->price; } 
    public function getWired() { return $this->wired; } 
    public function setPrice($price) { $this->price = $price; } 
    public function setWired($wired) { $this->wired = $wired; }
}