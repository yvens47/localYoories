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
$id = $_GET['id'];
echo empty($id);

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

                        echo $youtube->getDescription();

                    }

                    ?>
                    <hr/>
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




                <hr>

            </div>
            <div class="col-md-4 views-left">

                <div class="social-login">

                    <div class="panel">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">WatchLists  <span class=" pull-right label label-info">4</span> </h3>
                            </div>
                            <div class="panel-body">
                                <ul class="latest">
                                    <?php
                                        $watchlist = $youtube->viewWatchList();
                                        if(is_array($watchlist) && count($watchlist) > 1 ):
                                            foreach($watchlist as $list): ?>
                                              <?php   $movie = $youtube->features($list['movie_id']);    ?>
                                                <li>
                                        <img src="<?php echo $movie[0][3]  ?>" alt="">

                                        <p class="ltitle"> <?php echo $movie[0][1] ?></p>
                                        <i class="glyphicon glyphicon-remove-sign"></i>
                                    </li>

                                      <?php endforeach      ?>

                                        <?php endif  ?>




                                </ul>

                            </div>
                            <div class="panel-footer">Google+ is Recommended</div>
                        </div>
                        </div>

                </div>
                <h2> Most Popular</h2>
                <div class=" recom">
                    <img class="" src="http://upload.wikimedia.org/wikipedia/commons/5/53/Eiffel_tower_fireworks_on_July_14th_Bastille_Day.jpg">
                    <p> a bunch of contents will be here here to describe this videos
                        <a href="" class="btn btn-warning">Vierw </a>
                    </p>

                </div>



            </div>
        </div>




        <div class="row">


        </div>




<?php require_once 'template/footer.php' ?>