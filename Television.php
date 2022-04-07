
<?php

include_once 'ElectronicItem.php';
class Television extends ElectronicItem {

    public function __construct($price, $wired){
        $this->price = $price;
        $this->wired = $wired;
    }

    public function maxExtras() {
        return PHP_INT_MAX;
    }
}

$a = new Television(0, true);
echo $a->maxExtras();

?>