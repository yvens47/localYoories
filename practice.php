<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/14/15
 * Time: 9:45 AM
 */


$title  = "{full haitian movie}";



//$title = str_replace("\((.*)\)", " ", $title);
$title = preg_replace("/{.*}/i", "", $title);

echo strtolower($title);

$string = "type=how-to";

$new = explode('=', $string);



