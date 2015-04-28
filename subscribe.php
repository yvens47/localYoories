<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/27/15
 * Time: 1:19 AM
 */


require_once 'autoload.php';

$email = $_POST['email'];

$subs = new Subscriber($email);

$subs->subscribe();