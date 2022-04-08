<?php

include_once 'ElectronicItems.php';

abstract class ElectronicItem {

    protected $price;
    protected $wired;
    protected $extras = array();

    protected abstract function maxExtras();

    public function addExtra($extra) {
        $size = count($this->extras);
        if($size < $this->maxExtras()) {
            array_push($this->extras, $extra); 
        }
    }

    public function countExtras() {
        return ($this->extras != null) ? count($this->extras) : 0;
    }

    public function getExtras() {
        return $this->extras;
    }

    public function getTotalPrice() {
        $total = $this->price;
        if($this->extras != null) {
            $items = $this->extras;
            foreach ($items as $item) {
                $total += $item->getPrice();
            }
        }
        return $total;
    }

    public function getPrice() { return $this->price; } 
    public function getWired() { return $this->wired; } 
    public function setPrice($price) { $this->price = $price; } 
    public function setWired($wired) { $this->wired = $wired; }
}

?>