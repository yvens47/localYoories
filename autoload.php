<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:11 AM
 */


spl_autoload_register(function($class){
    $dir = __DIR__.DIRECTORY_SEPARATOR.'/Classes/';
    if(file_exists($dir.$class.".php")){
        require  $dir.$class.".php";
    }
});
