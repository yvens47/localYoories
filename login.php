<?php ob_start(); ?>
<?php

session_start();
require_once "autoload.php";
$user = new User() ;
$page = new Page("Login");
require_once 'template/header.php';

$user = UserFactory::create();


if($user->isLogin()){
    header('location: app.php');
}

?>

<div class="container">
    <div class="row">
        <div class="form-wrap">
            <?php  require_once "Form/login.php"?>
            <?php $user->gooleLogin() ?>

            </div>
    </div>

<?php require_once 'template/footer.php'?>
