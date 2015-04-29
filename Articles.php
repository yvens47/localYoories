<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:10 AM
 */

require_once "autoload.php";
$page = new Page("welcome");
$youtube = new GoogleApi();
$videos = new Videos();

$type = 1;
if(isset($_GET['type'])){$type = $_GET['type'];}
$articles = new Articles($type);

$data = ($videos->videoIds());
$pagination = new Pagination($data);

?>

<?php require_once 'template/header.php' ?>

<div class="feature-post">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <img src="Uploads/thumb2.jpg" class="thumbnail"/>
                <h2>Title of the feature content</h2>
                <p> Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                    type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing  <a href="#" class="btn-link">Read Mored....</a> </p>

            </div>

        </div>
    </div>

</div>
<div id="push-2"></div>

    <div class="container">
    <div class="row">
    <div class="col-md-3">
        <?php require_once 'template/sidebar.php' ?>

        <div class="add">

        </div>

    </div>
    <div class="col-md-6">
        <div class="pview-banner">
            <p>
               We currently have  <span class="label label-danger"><?php echo $articles->countPosts() ?></span> Articles

                <a href="add.php" class="btn  adding btn-primary">add</a>
            </p>




        </div>
            <?php

              if(isset($_GET)){
                  $articles->displayArticles();
              }
             else{
                // header('location: index.php');

             }

            ?>


        </div>

        <div class="col-md-3">
            <div class="ads">


            </div>
            <div class="latest-wrap">
                <div class="latest-title">
                    <p>Most Populars</p>
                </div>
                <div class="latest-content"></div>
            </div>
        </div>
    </div>
</div>

<?php require_once "template/footer.php"?>
