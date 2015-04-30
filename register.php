
<?php

require_once "autoload.php";
$page = new Page("Member Registration");
 $user = new User();
$articles = new Articles(1);
require_once 'template/header.php';
?>

<div class="container">
    <div class="row">
        <div class="form-wrap" >
            <form class="form-horizontal" action="doRegister.php" method="post">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email"  name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password"  name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign Up</button>
                        or <a href="login.php" class="btn-link">Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once 'template/footer.php'; ?>
