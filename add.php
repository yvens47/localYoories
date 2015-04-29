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
$articles = new Articles(null);

$categories = $articles->categories();

?>

<?php require_once 'template/header.php' ?>

<div id="push-2"></div>
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <h1>Add an Article</h1>
            <h2></h2>
            <form class="form-horizontal" action="Post/Add.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Short-summary</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="summary" placeholder="Summary"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                       <select name="category">
                           <?php foreach($categories as $category): ?>
                           <option value="<?php echo $category['Category'] ?>"><?php echo $category['Name'] ?></option>


                        <?php endforeach; ?>
                       </select>

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="body" id='body' placeholder="click to write your article"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control" id="image" placeholder="title">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>