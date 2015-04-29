<?php ob_start(); ?>
<?php

session_start();
require_once "autoload.php";
$user = new User() ;
$articles = new Articles(1);
$page = new Page("Login");
require_once 'template/header.php';

$user = UserFactory::create();


if($user->isLogin()){
    header('location: app.php');
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="form-wrap form-wrap-bg">
            <?php  require_once "Form/login.php"?>


            </div>
        </div>
    </div>

<?php require_once 'template/footer.php'?>
