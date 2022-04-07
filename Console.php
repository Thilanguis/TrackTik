
<?php

class Console extends ElectronicItem {

    public function __construct($price, $wired){
        $this->price = $price;
        $this->wired = $wired;
    }

    public function maxExtras() {
        return 4;
    }
}

?>