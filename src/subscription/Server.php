<?php
namespace App\subscription;

class Server{
    public $name;
    public $ipAddress;
    
    // public function __construct()
    // {
    //     $name="";
    //     $ipAddress="";
    // }
    
    function setName($name){
        $this->name = $name;
    }

    function getName(){
        return $this->name;
    }

    function setServer($server){
        $this->server =$server;
    }

    function getServer(){
        return $this->server;
    }
}

?>