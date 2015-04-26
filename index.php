<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:10 AM
 */

session_start();

require_once "autoload.php";

$user = new User();
$page = new Page("welcome");
$youtube = new GoogleApi();
$videos = new Videos();

$data  = ($videos->videoIds() );
$articles = new Articles(null);
$pagination = new Pagination($data);

$features = array_slice($data, 2,5);


?>

<?php require_once 'template/header.php' ?>


<div class="banner">


    <div class="container">
        <div class="alert  info alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <p>We'd like to let you know That the Site is currently in <b>beta</b> stage. which means, some of the features might not work.
                Please be patient.
            </p>
        </div>
        <div class="row">


            <div class="col-md-8"><div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="Uploads/mortal.jpg" alt="...">
                            <div class="carousel-caption">
                                ...
                            </div>
                        </div>
                        <div class="item">
                            <img src="http://yoories.com/pic2.png" alt="...">
                            <div class="carousel-caption">
                                ...
                            </div>
                        </div>
                        ...
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div></div>
            <div class="col-md-4">
                <div class="panel panel-primary" style="height:360px">
                    <div class="panel-heading"><h3 class="panel-title">Latest Movies</h3></div>
                    <div class="panel-body">
                        <ul class="latest">

                            <?php
                              $youtube->mostPopularYoutube(4) ;

                            ?>


                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 rel">
            <img src="Images/watch.png" class="img-home img-circle "/>
            <div class="home-div">
            <h2>Heading</h2>
            <p>Watch anytime or save to your playlist for later use. whichever feels right </p>
            <p><a class="btn btn-default" href="#" role="button">View details »</a></p></div>
        </div>
        <div class="col-md-6 rel">
            <img src="Images/1429076059_share-128.png" class="img-circle img-home "/>
            <div class="home-div">
            <h2>Easy Share</h2>
            <p>Select and Share favorite part of videos to  others on any major social networking sites </p>
            <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
                </div>
        </div>
    </div>

    <hr/>


    <div class="row">
        <div class="col-md-3 left-col-4">
            <!--<img src="http://yoories.com/pic.png"/>
            <p>Donec sed odio lus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
            <div class="left-nav">
                <div class="block-form">
                    <form class="form-horizontal">

                        <div class="form-group">

                            <div class="col-sm-10">
                                <input type="search" class="form-control block-form-search" id="inputPassword" placeholder="search ">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="filter-nav">
                    <p class="category">Articles</p>
                    <ul>
            <?php foreach($articles->categories() as $category): ?>

                    <li class="active "><a href="Articles.php?type=<?php echo $category['type'] ?>"><?php  echo $category['type'] ;?>
                            <span class="badge"><?php echo $articles->countCats($category['type']) ?></span></a> </li>

                <?php endforeach ;?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-9">

<?php

 //echo $pagination->total();
//print_r($pagination->paginate());
$chunks =  array_chunk(iterator_to_array($pagination->getPaginData()),4);

foreach($chunks as $chunk){
    echo "<div class=\"row\">";
     foreach ($chunk as $key => $ch){
         //$youtube->video($ch['vidid']);
        // echo $key;

         $id  = $chunk[$key]['vidid'];
         $youtube->video($id);


     }

    echo "</div>";
    echo "<hr/>";
}


?>


<div class="row">
    <?php
     $i = isset($_GET['page']) ? $_GET['page'] : 1; ?>
            <nav>
                <ul class="pagination pagination-lg">
                    <li>
                        <a href="<?php $_SERVER['PHP_SELF'] ?>?page=<?php echo $i-1?> " aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php $pagination->link(); ?>
                    <li>
                        <a href="<?php $_SERVER['PHP_SELF'] ?>?page=<?php echo $i+1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    </div>


    <?php require_once "template/footer.php"?>