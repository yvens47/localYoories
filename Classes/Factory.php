<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/16/15
 * Time: 7:56 PM
 */

require_once 'Comment.php';
class Factory {

    function build($id, $body){

        $comment = new Comment($id,$body);

        return $comment;
    }

}