<?php

namespace App\subscription;

class User
{
    // Properties
    public $name;
    public $planSubcribe;
    public $connectedServer;
    public $listServer;

    // Methods
    public function __construct()
    {
        $this->listServer = array();
        $this->planSubcribe = "No Plan";
        $this->name = "";
        $this->connectedServer = 0;
    }
    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }
    function subscribe($plan)
    {
        print "Action: Subscribing to the plan Basic Plan ...\n";
        sleep(5);
        $this->planSubcribe = $plan;
        //welcoming user based on plan subscribed
        $plan->welcome();
    }

    function connectServer($server)
    {
        sleep(5);
        print "Action: connecting " . $server->name . " ...\n";
        sleep(5);
        $limitExceed = false;


        if ($this->planSubcribe == "No Plan") {
            print " Error => User is not Subscribe to any plan \n\n\n";
        } else {
            $this->connectedServer++;
            if ($this->planSubcribe->name == "Basic Plan") {

                if ($this->connectedServer <= $this->planSubcribe->maxServer) {
                    array_push($this->listServer, $server);
                } else {
                    $this->connectedServer--;
                    $limitExceed = true;
                }
            } elseif ($this->planSubcribe->name  == "Pro Plan") {
                if ($this->connectedServer <= $this->planSubcribe->maxServer) {
                    array_push($this->listServer, $server);
                } else {
                    $this->connectedServer--;
                    $limitExceed = true;
                }
            }
            if ($limitExceed) {
                print " Error => User Exceed Server Limit allowed for the Plan " . $this->planSubcribe->name . " ! \n\n\n";
            } else {
                $str = '';

                print " Action => " . $server->name . " is connected ! \n\n";
                sleep(5);
                print "+----------------------------------- \n";
                print "User's Name => " . $this->name . "\n\n";
                print "Current Plan => " . $this->planSubcribe->name . "\n\n";
                print "Connected Server => ";
                foreach ($this->listServer as $key => $value) {
                    $str = ($str == '' ? '' : $str . ', ') . $value->name . " [" . $value->ipAddress . "]";
                }
                print $str . "\n";
                print "+-----------------------------------\n\n\n";
            }
        }
    }

    function unsubscribe()
    {
        print "Action: Cancelling Subscription to Plan Pro Plan \n\n";
        sleep(5);
        /*
         Clear the server , update no plan subscribed, and connectedServer set to 0
        */
        $this->listServer = array();
        $this->planSubcribe = "No Plan";
        $this->connectedServer = 0;
        print "You have successfully unsubscribed from plan Pro Plan. \n";
        print "Thank you for using Runcloud\n\n";
    }
}