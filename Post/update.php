<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/15/15
 * Time: 4:02 AM
 */


//print_r($_POST);
//echo $_POST['post_id'];

require_once "../autoload.php";

$articles  = new Articles('post');
$id = $_POST['post_id'];
$title = $_POST['title'];
$body = $_POST['body'];

$articles->create()->edit($id, $title, $body);