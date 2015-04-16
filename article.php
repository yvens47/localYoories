<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/15/15
 * Time: 12:56 AM
 */



?>
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

$articles = new Articles('');
$data = ($videos->videoIds());
$pagination = new Pagination($data);

?>

<?php require_once 'template/header.php' ?>


<div id="push-2"></div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php require_once 'template/sidebar2.php' ?>

            <div class="add">
                <a href="#" class="btn btn-primary add_btn">Add Article</a>
            </div>

        </div>
        <div class="col-md-6">

            <?php





           // $articles->article($id);
            $article =  $articles->article();



            if($articles->isArray($article)){ ?>
                    <div class="post-view">
                <h1><?php echo $article['title']; ?></h1>
                        <span class="badge">35 views</span>
                <span><a href="editArticle.php?id=<?php echo $article['post_id'] ;?>">
                        <i class="glyphicon glyphicon-pencil"></i></a> </span>
                <img src=""/>
                <p><?php echo $article['body']; ?></p>
                </div>
            <?php   }
            else{
                echo $article;
            }





            ?>
            <div class="suggestions">
                <h2>You might also like these</h2>
            </div>


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
