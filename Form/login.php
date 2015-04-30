<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 id="oh-snap!-you-got-an-error!">Oh snap! You got an error!<a class="anchorjs-link" href="#oh-snap!-you-got-an-error!"><span class="anchorjs-icon"></span></a></h4>
    <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
    <p>
        <button type="button" class="btn btn-danger">Take this action</button>
        <button type="button" class="btn btn-default">Or do this</button>
    </p>
</div>

<form class="form-horizontal login" action="doLogin.php" method="post" name="login">
    <div id="form-wrap">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email"  name="email" class="form-control email" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password"  name="password" class="form-control password" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    </div>
   <!-- <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>-->


    <div class="form-login">
        <div class="form-group login-btn">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary login-send">Sign in</button>
            </div>
        </div>
        <?php $user->gooleLogin() ?>
    </div>
</form>