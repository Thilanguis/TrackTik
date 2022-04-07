<?php

class ElectronicItems {

    private $items = array();

    public function __construct (array $items){

        $this->items = $items;

    }


    public function addItem($item) {
        array_push($this->items, $item); 
    }

    public function getItems() {
        return $this->items;
    }
    

    public function getSortedItems(){

        $sorted = array();

        foreach ($this->items as $item) {

            $sorted[($item->getPrice() * 100)] = $item;

        }

        return $sorted;

    }

}