<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/19/15
 * Time: 11:52 PM
 */

echo  realpath(dirname(__FILE__))."/../autoload.php";

$user = new User();
print_r($user);
echo  realpath(dirname(__FILE__) . '/../src/Google/autoload.php');