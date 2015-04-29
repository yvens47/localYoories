
<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:10 AM
 */

 $id =  $_GET['id'];


require_once "autoload.php";
$page = new Page("welcome");
$youtube = new GoogleApi();
//$videos = new Videos();

$articles = new Articles('article');
$post = $articles->edit($id);


?>

<?php require_once 'template/header.php' ?>

<div id="push-2"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">

            <h1> Edit</h1>
            <h2></h2>
            <?php require_once 'Post/_edit-form.php' ; ?>

        </div>
    </div>
</div>

<?php require_once 'template/footer.php' ?>