<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 9:18 AM
 */
require_once '../autoload.php';
$error = array('title'=> "Title cannot bet empty", "body"=>"Please go back and enter some content");

if(isset($_POST)){

    if(empty($_POST['title'])){
        echo $error['title'];
        exit();
    }
    else if(empty($_POST['body'])){
        echo $error['body'];
    }
    else{
        $post = new Post();
        print_r($post);
        $p = array('title'=> $_POST['title'], 'body'=>$_POST['body'],"type"=>"articles" );

        $post->add($p);


    }

}