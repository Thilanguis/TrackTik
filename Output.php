<?php

include 'Controller.php';
include 'ElectronicItems.php';
include 'Console.php';
include 'Television.php';
include 'Microwave.php';

ini_set('memory_limit', '44M');

// class Output {

//     public function teste() {
//         return "Teste";
//     }

// }

// $teste = new Output();
// echo $teste->teste();

class Output{

    public function teste() {
        return "Teste";
    }
 
    public function scenario1() {

        $console = $this->getConsole();
        $telesivion1 = $this->getTelevision1();
        $telesivion2 = $this->getTelevision2();
        $microwave = new Microwave();

        $shops = new ElectronicItems(array($console, $telesivion1, $telesivion2, $microwave));

        return $shops;

    }

    private function getConsole() {
        $consoleControllerWired1 = new Controller();
        $consoleControllerWired1->setWired(true);
        $consoleControllerWired2 = new Controller();
        $consoleControllerWired2->setWired(true);

        $consoleControllerNoWired1 = new Controller();
        $consoleControllerNoWired1->setWired(false);
        $consoleControllerNoWired2 = new Controller();
        $consoleControllerNoWired2->setWired(false);

        $console = new Console();
        $console->addExtra($consoleControllerWired1);
        $console->addExtra($consoleControllerWired2);
        $console->addExtra($consoleControllerNoWired1);
        $console->addExtra($consoleControllerNoWired2);

        return $console;
    }

    private function getTelevision1() {
        $consoleControllerNoWired1 = new Controller();
        $consoleControllerNoWired1->setWired(false);
        $consoleControllerNoWired2 = new Controller();
        $consoleControllerNoWired2->setWired(false);

        $telesivion = new Television();
        $telesivion->setPrice(220.99);
        $telesivion->addExtra($consoleControllerNoWired1);
        $telesivion->addExtra($consoleControllerNoWired2);

        return $telesivion;

    }

    private function getTelevision2() {
        $consoleControllerNoWired1 = new Controller();
        $consoleControllerNoWired1->setWired(false);

        $telesivion = new Television();
        $telesivion->setPrice(220.99);
        $telesivion->addExtra($consoleControllerNoWired1);

        return $telesivion;
    }
}

$teste = new Output();
echo $teste->teste();
echo $teste->scenario1();
print_r($teste);
// echo $teste->getConsole();

?>