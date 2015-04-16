<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:10 AM
 */

require_once "autoload.php";
$page = new Page("welcome");
 $id = $_GET['id'];
$youtube = new GoogleApi();

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
                    <?php
                    $youtube->comments();
                    ?>
                </div>




                <hr>




                <div class="comments">

                    <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-width="100%" data-numposts="5" data-colorscheme="light" data-href="http://yoories.com/view.php?id=GcZsEJSWc8w" fb-xfbml-state="rendered"><span style="height: 176px; width: 750px;"><iframe id="fc230f014" name="f25405bd6" scrolling="no" title="Facebook Comments Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=612412602139631&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F6Dg4oLkBbYq.js%3Fversion%3D41%23cb%3Df22fc5b318%26domain%3Dyoories.com%26origin%3Dhttp%253A%252F%252Fyoories.com%252Ff2bc5edc84%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fyoories.com%2Fview.php%3Fid%3DGcZsEJSWc8w&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.3&amp;width=100%25" style="border: none; overflow: hidden; height: 176px; width: 750px;"></iframe></span></div>

                </div>
            </div>
            <div class="col-md-4 views-left">
                <ul class="most-popular">
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

                    </li>            </ul>
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