<?php

include_once 'ElectronicItem.php';

class Controller extends ElectronicItem {

    public function __construct($price, $wired){
        $this->price = $price;
        $this->wired = $wired;
    }

    public function maxExtras() {
        return 0;
    }


}

?>