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
               <!-- <ul class="most-popular">
                    <li>
                        <a href="video.php?id=DA7sDnn6AmA">
                            <img src="https://i.ytimg.com/vi/DA7sDnn6AmA/hqdefault.jpg" alt="Haitian reporters be like">
                        </a>
                        <p class="ltitle"> Haitian reporters be like</p>

                    </li><li>
                        <a href="video.php?id=7aFOE0n5K3c">
                            <img src="https://i.ytimg.com/vi/7aFOE0n5K3c/hqdefault.jpg" alt="Haitian (Funny Videos)">
                        </a>
                        <p class="ltitle"> Haitian (Funny Videos)</p>

                    </li><li>
                        <a href="profile.php?id=T5Y84g57cnc">
                            <img src="https://i.ytimg.com/vi/T5Y84g57cnc/hqdefault.jpg" alt="funny haitian political jokes">
                        </a>
                        <p class="ltitle"> funny haitian political jokes</p>

                    </li><li>
                        <a href="profile.php?id=nklANzTpsoY">
                            <img src="https://i.ytimg.com/vi/nklANzTpsoY/hqdefault.jpg" alt="Nazaire :: Haitian Superflat :: Heineken Draughtkeg">
                        </a>
                        <p class="ltitle"> Nazaire :: Haitian Superflat :: Heineken Draughtkeg</p>

                    </li><li>
                        <a href="profile.php?id=Ny7X4QfjSMU">
                            <img src="https://i.ytimg.com/vi/Ny7X4QfjSMU/hqdefault.jpg" alt="Men Doktè Zoe (Funny Haitians)">
                        </a>
                        <p class="ltitle"> Men Doktè Zoe (Funny Haitians)</p>

                    </li><li>
                        <a href="profile.php?id=4IzpVV8nfaM">
                            <img src="https://i.ytimg.com/vi/4IzpVV8nfaM/hqdefault.jpg" alt="Funny ass video Haitian dogiein lol.east side">
                        </a>
                        <p class="ltitle"> Funny ass video Haitian dogiein lol.east side</p>

                    </li>            </ul>-->

                <div class="social-login">

                    <div class="panel">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Login</h3>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Sign in</button>
                                        </div>
                                    </div>
                                </form>
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