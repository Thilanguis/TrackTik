<?php

include_once 'ElectronicItem.php';
include_once 'ElectronicItems.php';
include_once 'Television.php';
include_once 'Console.php';
include_once 'Microwave.php';
include_once 'Controller.php';

class Output {

    public function scenario1() {

        $items = new ElectronicItems($this->getEletronicItemList());

        foreach($items->getItems() as $item) {
            echo '<br>Item : '.get_class($item).' - $'.$item->getPrice();
            if($item->getExtras() != null || $item->countExtras() > 0) {
                foreach($item->getExtras() as $extra) {
                    echo '<br>Extras : '.get_class($extra).' - $'.$extra->getPrice();
                }
            }
            echo '<br>';
        }

        echo '<br>Total : '.$items->getTotalAmount().'<br>';

    }

    public function scenario2() {
        $items = new ElectronicItems($this->getEletronicItemList());
        foreach($items->getItems() as $item) {
            if($items->getItemsByType($item, 'Microwave')) {
                echo 'Total price for console with extras : '.$item->getTotalPrice();
            }
        }
    }

    public function getEletronicItemList() {
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

        $shoppingList = new ElectronicItems([
            $television2,
            $console, 
            $television1,
            $microwave
        ]);

        $shoppingList->getTotalAmount();
        return $shoppingList->getSortedItems();
    }

}

$test = new Output();
echo '<br><b>Scenario 1 </b><br>';
$test->scenario1();
echo '<br><b>Scenario 2 </b><br>';
$test->scenario2();

?>