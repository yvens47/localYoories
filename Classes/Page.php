<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:11 AM
 */

class Page {

    private $title;
    private $metaDesc;
    private $keywords;


    function __construct($title){

        $this->setTitle($title);
    }
    function setTitle($title){
        $this->title = $title;
    }

    function getTitle(){
        return $this->title;
    }




}