<?php

require 'ElectronicItem.php';

class Console extends ElectronicItem{

    public function __construct(){

    }

    public function maxExtras() {
        return 4;
     }
}

