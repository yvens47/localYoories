<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/16/15
 * Time: 4:22 AM
 */

require_once "google/src/Google/autoload.php";
class GoogleLogin {
    private $client;
    private $service;
    private $clientId = "1081761800802-d0t3qs3392vg2jb9ermqj7jbhajbuuga.apps.googleusercontent.com";
    private $clientKey = "CI8W-80h8FpR4acfnxF4Yg_-";


    function __construct(){

        $this->client = new Google_Client();
        $this->client->setApplicationName("Yoories");
        $this->client->setDeveloperKey("AIzaSyD4UsaxhiSdIIPS6wsVcWkCRxNw4qRvz-c");
        // parent::__construct($this->client);
        $this->client->setClientId($this->clientId);
        $this->client->setClientSecret($this->clientKey);

    }


}