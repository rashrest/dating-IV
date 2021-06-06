<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

//Start a session
session_start();

//require autoload file
require_once('vendor/autoload.php');
include_once('model/dataval.php');
require ('controller/Controller.php');
require ('classes/Member.php');
require ('classes/PremiumMember.php');

//Instantiate fat-free
$f3=Base::instance();
$control = new Controller($f3);
$datalayer = new Datalayer();


//define route before your run fat-free
//define default route
$f3->route('GET /',function (){
    $GLOBALS['control']->home();
});

////define route to personal page
$f3->route('GET|POST /Personal',function (){
    $GLOBALS['control']->personal();

});

////define route to Profile page
$f3->route('GET|POST /Profile',function (){

    $GLOBALS['control']->profile();

});

////define route to interest page
$f3->route('GET|POST /Interest',function (){

    $GLOBALS['control']->interest();


});

////define route to summary page
$f3->route('GET|POST /Summary',function (){

    $GLOBALS['control']->summary();

});


//Run Fat-Free /Fat free
$f3->run();