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

$data  = ($videos->videoIds() );
$pagination = new Pagination($data);

?>

<?php require_once 'template/header.php' ?>

<div class="banner">
    <div class="container">
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
                            <img src="http://yoories.com/pic.png" alt="...">
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
                <div class="panel panel-primary" style="height:318px">
                    <div class="panel-heading"><h3 class="panel-title">Latest Movies</h3></div>
                    <div class="panel-body">
                        <ul class="latest">
                            <li>
                                <img src="http://static1.gamespot.com/uploads/original/1365/13658182/2559558-mortalkombatx_kotal_scorpion_snowforest_choke.jpg" alt="">

                                <p class="ltitle"> title for the latest video in the database display here</p>
                            </li>
                            <li>
                                <img src="http://static1.gamespot.com/uploads/original/1365/13658182/2559558-mortalkombatx_kotal_scorpion_snowforest_choke.jpg" alt="">

                                <p class="ltitle"> title for the latest video in the database display here</p>
                            </li>
                            <li>
                                <img src="http://static1.gamespot.com/uploads/original/1365/13658182/2559558-mortalkombatx_kotal_scorpion_snowforest_choke.jpg" alt="">

                                <p class="ltitle"> title for the latest video in the database display here</p>
                            </li>

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
                                <input type="search" class="form-control block-form-search" id="inputPassword" placeholder="filter">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="filter-nav">
                    <p class="category">Category</p>
                    <ul>
                        <li><a href="">Videos</a> </li>
                        <li><a href="">Tutorisl</a> </li>
                        <li><a href="">Videos</a> </li>
                        <li><a href="#">Jokes</a> </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-9">

<?php

$n = iterator_to_array($pagination->getPaginData());
$chunk = array_chunk($n, 4);

$chunk = array_chunk($n, 4);
foreach ($chunk as $key=> $chuns) {
    echo "<div class=\"row content\" style='margin:0'>";
    foreach ($chuns as $key =>$ch) {
        $youtube->video($ch['vidid']);
    }
    echo "</div>";
}


?>


<div class="row">
            <nav>
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php $pagination->link(); ?>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    </div>


    <?php require_once "template/footer.php"?>