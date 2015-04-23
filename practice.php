<?php


require_once "autoload.php";

;
$page = new Page("welcome");
$youtube = new GoogleApi();
$videos = new Videos();

$data  = ($videos->videoIds() );

$pagination = new Pagination($data);

$features = array_slice($data, 2,5);

echo  "<pre/>";
foreach($features as $feature){
    $videos = $youtube->features($feature['vidid']);
    foreach($videos as $vid){
        print_r($vid);
        echo $vid[1].'<br/>';
    }

}


?>
