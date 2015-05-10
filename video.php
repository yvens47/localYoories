<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:10 AM
 */
session_start();


require_once "autoload.php";

$page = new Page("welcome");
$id = $_GET['id'];

$articles = new Articles(null);

if(empty($id)){
    header("location: index.php");
}
$youtube = new GoogleApi();

if(!$youtube->isVideoFound($id)){
     header("location: index.php");
}

?>

<?php require_once 'template/header.php' ?>

<div class="container">
    <div class="row">
        <div style="margin-top: 20px"></div>

        <div class="col-md-8 views-main">
            <div class="embed-responsive embed-responsive-16by9">
                <?php $youtube->vidInfo($id) ; ?>

            </div>
            <div class="i-wrapper">
                <ul class='p-icons'>
                    <li><i class="glyphicon glyphicon-play"></i></li>
                    <li><i class="glyphicon glyphicon-eye-open"></i></li>
                    <li><i class="glyphicon glyphicon-plus"></i></li>
                    <li> <i class="glyphicon glyphicon-thumbs-up"></i></li>
                </ul>
            </div>
            <div class="desc">

                <i class="glyphicon glyphicon-pencil launch-desc" data-toggle="modal" data-target="#myModal" ></i></a>
                <?php
                if(($youtube->getDescription() =="")){
                    echo "does not have a description yet Please add A description for this video";
                }else{

                    echo "<p class='p-desc'>" . $youtube->getDescription()."</p>";

                }

                ?>
                <hr/>


            </div>




            <hr>

        </div>
        <div class="col-md-4 views-left">

            <div class="social-login">

                <div class="panel">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <?php  $watchlist = $youtube->viewWatchList(); ?>
                            <h3 class="panel-title"> Your WatchLists  <span class=" pull-right label label-info">
                                        <?php echo sizeof($watchlist) ?></span> </h3>
                        </div>
                        <div class="panel-body">
                            <ul class="latest">
                                <?php
                                $watchlist = $youtube->viewWatchList();
                                if($watchlist ==0 ){
                                    echo " No Movie added to your watchlists yet";
                                }

                                else
                                    if(is_array($watchlist) && count($watchlist) > 1 ):
                                        foreach($watchlist as $list): ?>
                                            <?php   $movie = $youtube->features($list['movie_id']);    ?>
                                            <li>
                                                <a href="video.php?id=<?php echo $movie[0][0]; ?>">
                                                    <img src="<?php echo $movie[0][3]  ?>" alt="">
                                                </a>

                                                <p class="ltitle"> <?php echo $movie[0][1] ?></p>
                                                <i class="glyphicon glyphicon-remove-sign"></i>
                                            </li>

                                        <?php endforeach      ?>

                                    <?php else:  ?>
                                        <?php
                                        $movie = $watchlist['movie_id'] ;
                                        $m = $youtube->features($movie);

                                        ?>
                                        <li>
                                            <a href="video.php?id=<?php echo $m[0][0]; ?>">
                                                <img src="<?php echo $m[0][3]  ?>" alt="">
                                            </a>

                                            <p class="ltitle"> <?php echo $m[0][1] ?></p>
                                            <i class="glyphicon glyphicon-remove-sign"></i>
                                        </li>

                                        <li>

                                        </li>


                                    <?php endif ?>




                            </ul>

                        </div>
                        <div class="panel-footer"></div>
                    </div>
                </div>

            </div>
            <div class="most">
                <h2 style="   color: #51ADB3;    font-family: times;"> Most Popular</h2>
                <div class=" recom">
                    <div class="recom-1">
                        <img class="" src="Images/mostPopular.jpg">
                        <p> a bunch of  here to describe this videos
                            <a href="" class="btn btn-warning">Vierw </a>
                        </p>
                    </div>

                    <div class="recom-1">
                        <img class="" src="Images/cousine.png">
                        <p>  here here to describe this videos
                            <a href="" class="btn btn-warning">Vierw </a>
                        </p>
                    </div>


                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Subscriber
                </div>
                <div class="panel-body">

                    <form class="form-inline" method="post" action="subscribe.php" name="subscribe" class="subscribe-form">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                            <input type="email"  name='email' class="form-control" id="subscribe" placeholder="Enter email">
                        </div>

                        <button type="submit" class="btn btn-default">Sign in</button>
                    </form>
                </div>

            </div>






        </div>
        <div class="clearfix"></div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <div class="item active">


                        <ul class="item-content">
                            <li>
                                <img src="Images/cousine.png" alt="...">
                                <p>   Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                  </p>


                            </li>

                            <li>
                                <img src="Images/cousine.png" alt="...">
                                <p>   Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>


                            </li>

                            <li>
                                <img src="Images/cousine.png" alt="...">
                                <p>   Lorem Ipsum is simply dummy
                                </p>


                            </li>

                            <li>
                                <img src="Images/cousine.png" alt="...">
                                <p>   Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>


                            </li>





                        </ul>
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
            </div>
        </div>

        <div class="col-md-8">
            <div class="comment-box">
                <div class="comment-counts">
                    All Comments <span class="label label-danger">34</span>
                </div>
                <div class="comment-icon pull-left"></div>
                <div class="comment-box-wrap">
                    <form method="post" action="post_comment.php">
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Email address</label>-->
                            <input type="hidden" name="vidid"  value="<?php  echo $id ?>">

                                    <textarea class="yt-comment form-control" name="comment">

                                    </textarea>
                        </div>

                        <div class="post-comment-btn">
                            <div class="pull-left">
                                post on facebook
                            </div>
                            <button type="submit" class="btn btn-default pull-right ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            $youtube->comments();
            ?>
        </div>
        <div class="col-md-4"></div>


    </div>
</div>



<?php require_once 'template/footer.php' ?>