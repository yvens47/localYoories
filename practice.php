
<?php

require_once 'autoload.php';


/*if(isset($_POST)){

print_r($_FILES);

    if(!empty($_FILES) ) {
        $image = new ImageUpload($_FILES);
        if($image->checkSize()){
            if($image->checkExtension()){
                $image->saveImage("Uploads");
            }
            else{
                die("extennsion doe not");
            }

        }else{
            echo "file is too big";
        }


    }
}*/


?>

<form method="post"  action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <input type="file" name="image" multiple>
    <input type="submit">
</form>
