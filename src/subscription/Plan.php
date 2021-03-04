<?php

namespace App\subscription;

abstract class Plan{
    public $name;
    public $maxServer;
    abstract function welcome();
}

?>