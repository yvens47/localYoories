<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 9:18 AM
 */
require_once '../autoload.php';
$error = array('title'=> "Title cannot bet empty", "body"=>"Please go back and enter some content");

require_once '../Config.php';



if(isset($_POST)){

    if(empty($_POST['title'])){
        echo $error['title'];
        exit();
    }
    else if(empty($_POST['body'])){
        echo $error['body'];
    }
   else if(!empty($_FILES) ) {

        $post = new Post();
        echo $_SERVER['DOCUMENT_ROOT'];
        $p = array('title'=> $_POST['title'], 'body'=>$_POST['body'],"type"=>"articles" );
        $post->add($p);
       $image = new ImageUpload($_FILES);
       if($image->checkSize()){
           if($image->checkExtension()){
               $image->saveImage("Uploads");
           }
           else{
               die("extennsion doe not");
           }

       }else{
           echo "file is too big";
       }


    }else{

   }

}