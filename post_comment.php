<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/19/15
 * Time: 11:45 PM
 */

session_start();
require_once 'autoload.php';


require_once 'Config.php';



if(isset($_SESSION['access_token'])){

    //require_once  ROOTPATH . "/Classes/GoogleApi.php";
    print_r($_POST);
    $api = new GoogleApi();
    $vidid = $_POST['vidid'];
    $comment = $_POST['comment'];

    $api->postComment($vidid, $comment);



}
