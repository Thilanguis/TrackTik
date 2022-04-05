<?php

class ElectronicItems {

    private $items = array();

    public function __construct (array $items){

        $this->items = $items;

    }

    public function addItem($item){
        array_push($items, $item);
    }


    public function getItems() {
        return $this->items;
    }

}