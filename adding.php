<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/22/15
 * Time: 2:40 AM
 * description: adding to watch List Via ASjax Jquery
 */

session_start();
require_once 'autoload.php';


$user = new User();
if(!$user->isLogin()){

       return 0;
    exit;
}else{

    if(isset($_POST)){
        $title = $_POST['movieTitle'];
        $id = $_POST['vidid'];

        // save to table watchlist

        $youtube = new GoogleApi();

        $youtube->saveToWatchList($title, $id);
        echo $title;

    }
}

