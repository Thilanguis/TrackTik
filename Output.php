<?php

include_once 'ElectronicItem.php';
include_once 'Television.php';
include_once 'Console.php';
include_once 'Microwave.php';
include_once 'Controller.php';

class Output {

    public function scenario1() {
        $wiredController1 = new Controller(9.15, true);
        $wiredController2 = new Controller(9.15, true);

        $remoteController1 = new Controller(11.89, false);
        $remoteController2 = new Controller(11.89, false);


        $console = new Console(89.61, true);
        $console->addExtra($wiredController1);
        $console->addExtra($wiredController2);
        $console->addExtra($remoteController1);
        $console->addExtra($remoteController2);


        $television1 = new Television(289.55, true);
        $television1->addExtra($remoteController1);
        $television1->addExtra($remoteController2);

        $television2 = new Television(320.45, true);
        $television2->addExtra($wiredController1);

        $microwave = new Microwave(58.25, true);

        $prices = array(
            $console->getPrice(), 
            $television1->getPrice(), 
            $television2->getPrice(), 
            $microwave->getPrice()
        );

        $totalPrices = array(
            $console->getTotalPrice(), 
            $television1->getTotalPrice(), 
            $television2->getTotalPrice(), 
            $microwave->getTotalPrice()
        );

        $join = array_merge($prices, $totalPrices);
        array_multisort($join, SORT_ASC, SORT_NUMERIC);
        // var_dump($console->getSortedExtras());
        // var_dump($join);

        echo 'TOTAL CONSOLE : '.$console->getTotalPrice();

        // $total = array_sum($values);

        // echo 'TOTAL : '.$total;

    }

}



$teste = new Output();
var_dump($teste->scenario1());

?>