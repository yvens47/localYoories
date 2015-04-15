<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 8:58 PM
 */

session_start();
if(isset($_SESSION['userid'])){

    session_destroy();

    header("location: index.php");
}