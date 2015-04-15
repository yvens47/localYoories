<form class="form-horizontal" action="Post/update.php" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Post id</label>
        <div class="col-sm-10">
            <input type="text" readonly name="post_id" value="<?php echo $article['post_id'];?>">

        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="title" value="<?php echo $article['title']  ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Short-summary</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="summary" placeholder="Summary"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="body" id='body' placeholder="click to write your article">
                <?php  echo $article['body'] ;?>
            </textarea>
        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
</form>
