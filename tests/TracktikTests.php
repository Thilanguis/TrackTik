<?php

// namespace tests\TrackTikPHP;

use PHPUnit\Framework\TestCase;

include_once dirname(__DIR__).'\vendor\autoload.php';

include_once dirname(__DIR__).'\Controller.php';
include_once dirname(__DIR__).'\Microwave.php';
include_once dirname(__DIR__).'\Console.php';
include_once dirname(__DIR__).'\Television.php';
include_once dirname(__DIR__).'\ElectronicItems.php';

class TracktikTests extends TestCase {

    /**
     * Given a EletronicItem chield
     * When maxExtras() is called
     * Then the max extras allowed for this EletronicItem is returned
     */
    public function testWhenMaxExtrasIsCalledThenTheMaxExtrasAllowedIsReturnedAndVerifyIfEqual() {

        $controller = new Controller(11.89, true);
        $microwave = new Microwave(11.89, true);
        $television = new Television(11.89, true);
        $console = new Console(11.89, true);

        'Controller maxExtras: ' . $controller->maxExtras(); 
        'Microwave maxExtras: ' . $microwave->maxExtras(); 
        'Console maxExtras: ' . $console->maxExtras(); 
        'Television maxExtras: ' . $television->maxExtras(); 
    
        $this->assertEquals($controller->maxExtras(), 0);
        $this->assertEquals($microwave->maxExtras(), 0);
        $this->assertEquals($television->maxExtras(), PHP_INT_MAX);
        $this->assertEquals($console->maxExtras(), 4);
    }

    public function test_ElectronicItem() {
        $output = new ElectronicItems([]);

        $items = [];
        $stuff = [new Television(1199.99, true), new Controller(46.61, true), new Console(146.61, true), new Microwave(99.99, true)];
   
        foreach ($stuff as $key => $items) {
            /**
             * Testing addItem
             */
            $items = $output->addItem($items); //testing addItem

        }

        /**
         * Testing getItems
         */
        $getItem = $output->getItems();
        $result = $getItem;

        /**
         * Testing added items
         */
        $this->assertEquals(count($result), 4);
        
        $wiredController1 = new Controller(89.61, true);
        $wiredController2 = new Controller(56.61, true);
        $remoteController1 = new Controller(66.61, false);
        $remoteController2 = new Controller(46.61, false);
        
        $console = new Console(146.61, true);
        $console->addExtra($wiredController1);
        $console->addExtra($wiredController2);
        $console->addExtra($remoteController1);
        $console->addExtra($remoteController2);

        $television = new Television(1199.99, true);
        $television->addExtra($wiredController1);
        $television->addExtra($wiredController2);
        $television->addExtra($remoteController1);

        $microwave = new Microwave(99.99, true);

        $Controller = new Controller(125.99, true);

        $shoppingList = new ElectronicItems([
            $console, 
            $television,
            $microwave,
            $Controller
        ]);

        /**
         * Testing shoppingList with all items:
         */
        $this->assertEquals($shoppingList->getTotalAmount(), 2044.85);
        
        foreach($shoppingList->getItems() as $item) {
            if(is_a($item, 'Console')) {

                /**
                 * Testing Console with 4 extras:
                 * - The Console has 2 remote Controllers
                 * - The Console has 2 wired Controllers
                 */
                $this->assertEquals($item->getTotalPrice(), 406.05);
            }
            
            //===========================================================
        
            if(is_a($item, 'Television')){
        
                /**
                 * Testing Television with 3 extras:
                 * - The Television has 2 remote Controllers
                 * - The Television has 1 wired Controllers
                 */
                $this->assertEquals($item->getTotalPrice(), 1412.82);

            }
        }

        //===========================================================

    }
    
}

$TracktikTests = new TracktikTests();
$TracktikTests->testWhenMaxExtrasIsCalledThenTheMaxExtrasAllowedIsReturnedAndVerifyIfEqual();
echo $TracktikTests->test_ElectronicItem();
