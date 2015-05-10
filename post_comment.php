<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/19/15
 * Time: 11:45 PM
 */
/*
session_start();
require_once 'autoload.php';


require_once 'Config.php';

require_once 'Zend/Loader.php';

Zend_Loader::loadClass('Zend_Db');
$db = Zend_Db::factory('Mysqli',array(
    'host'     => '127.0.0.1',
    'username' => 'root',
    'password' => 'yvenstij43gt',
    'dbname'   => 'Yoories'
));
$query = $db->query("select * from posts  where post_id= ?", array(2));


print_r($query);

/*if(isset($_SESSION['access_token'])){

    //require_once  ROOTPATH . "/Classes/GoogleApi.php";
    print_r($_POST);
    $api = new GoogleApi();
    $vidid = $_POST['vidid'];
    $comment = $_POST['comment'];

    $api->postComment($vidid, $comment);



}*/

session_start();
require_once 'autoload.php';

$user = new User();

if(!$user->isLogin()){
     echo " You need to login to post a comment";

    exit;
}
?>


<?php


        if(isset($_POST['comment']) && isset($_POST['vidid'])){

            $comment = trim($_POST['comment']);
            $vidid = $_POST['vidid'];

            $userid = $_SESSION['userid'];

            $vidComment = new VidComment($vidid, $comment, $userid);

            $vidComment->insert();

        }




?>
