
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

        <ul class="nav nav-pills nav-stacked">
            <?php foreach($articles->categories() as $category): ?>
            <li class="active "><a href="?type=<?php echo $category['CatID'] ?>"><?php  echo $category['Name'] ;?>
                    <span class="badge pull-right"><?php echo $articles->countCats($category['CatID']) ?></span></a> </li>

            <?php endforeach ;?>
        </ul>
    </div>
</div>