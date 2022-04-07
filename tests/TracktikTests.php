<?php

include_once 'Controller.php';
include_once 'Microwave.php';
include_once 'Console.php';
include_once 'Television.php';
include_once 'ElectronicItems.php';
// include_once '..\PHPUnit\Framework\TestCase';

use PHPUnit\Framework\TestCase;

class TracktikTests extends TestCase {

    public function testController() {

        $output = new Controller(11.89, true);
        $result = $output->maxExtras();

        echo $this->assertEquals($result, 0);

    }

    public function testMicrowave() {

        $output = new Microwave(58.25, true);
        $result = $output->maxExtras();

        echo $this->assertEquals($result, 0);

    }
    
    public function testTelevision() {

        $output = new Television(289.55, true);
        $result = $output->maxExtras();

        echo $this->assertEquals($result, 9223372036854775807);

    }

    public function testConsole() {

        $output = new Console(89.61, true);
        $result = $output->maxExtras();

        echo $this->assertEquals($result, 4);

    }

    public function testElectronicItem() {
        $output = new ElectronicItems([]);

        $items = [];
        $stuff = ['tv', 'pc', 'remoto', 'microwave'];

        foreach ($stuff as $key => $items) {
            $items = $output->addItem($items); //testing addItem
        }

        $getItem = $output->getItems(); //testing getItems
        $result = $getItem;

        $this->assertEquals(count($result), 4);
        
        $outputConsole = new Console(89.61, true);
        for ($i=0; $i < 3; $i++) { 
            $outputConsole = [];
            $merge = [];
            // $merge = array_merge($output.$i);

            // $push = array_push($merge, $outputConsole->getPrice());
            $push = array_push($merge, $outputConsole->getPrice());

            $push->getTotalPrice();
            $push = $merge;
        }
        // $push->getSortedItems();
        $this->assertEquals($push, 89.61);
    }
    
}

// $TracktikTests = new TracktikTests();
// echo $TracktikTests;
// var_dump($TracktikTests);
// print_r($TracktikTests);