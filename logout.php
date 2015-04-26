<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 8:58 PM
 */

session_start();

if(isset($_SESSION['email']) || isset($_SESSION['token'])){

    session_destroy();
   // unset($_SESSION['token']);


    header("location: index.php");
}