<?php

include 'ElectronicItems.php';

class Television extends ElectronicItems{

    public function __construct(){ 
  
    }

    public function maxExtras(){
        return PHP_INT_MAX;
    }

}

$television = new Television();
echo $television->maxExtras();
