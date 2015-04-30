<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/16/15
 * Time: 4:22 AM
 */

require_once "google/src/Google/autoload.php";
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Paginator');
class GoogleLogin {
    private $client;
    private $service;
    private $clientId = "1081761800802-d0t3qs3392vg2jb9ermqj7jbhajbuuga.apps.googleusercontent.com";
    private $clientKey = "CI8W-80h8FpR4acfnxF4Yg_-";


    function __construct(){


    }


}