<?php
namespace App\subscription;

class BasicPlan extends Plan
{
    public function _construc()
    {
        $this->name = "Basic Plan";
        $this->maxServer = 1;
    }

    function welcome()
    {
        print "Subscribed to Basic Plan \n";
    }

}
?>