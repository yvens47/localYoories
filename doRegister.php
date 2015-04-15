<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 11:13 AM
 */

session_start();

require_once 'autoload.php';

$email = $_POST['email'];
$password = $_POST['password'];

$user = UserFactory::create();

$user->register($email, $password);

