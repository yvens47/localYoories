<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/14/15
 * Time: 9:45 AM
 */


$data = array(1,3,4,65,64,765,34,234,333,2345,5,5456,3,76,76675,434,6743,534543,656544,5,56456,3534,57454, 34,77,67);

//print_r($data);

require_once "Zend/Loader.php";

Zend_Loader::loadClass('Zend_Paginator');


$pagination = Zend_Paginator::factory($data);

$pagination->setItemCountPerPage(10);
$page = 1;

if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
}
$pagination->setCurrentPageNumber($page);


$pdate = iterator_to_array($pagination);
$chunks = array_chunk($pdate, 5);
foreach($chunks as $chunk){
    echo "<div>";
        foreach($chunk  as $ch){
            echo "<p>".$ch."</p>";
        }

    echo "<div>";
}


// print links

for($i =1; $i<count($pagination); $i++){
     echo "<a href=\"?page=$i\"> $i</a>";
}


//print_r($iterator);

while($iterator->valid()){
    $id = $iterator->current()['id'];
    $title = $iterator->current()['snippet']['title'];
    // print_r($iterator->current()['snippet']);
    $img = $iterator->current()['snippet']['thumbnails']['high']['url'];
    echo '<div class="trends thumbnail">
                            <a href="video.php?id='.$id.'">
                            <img src="'.$img.'" alt="'. $title.'" ></a> ';
    // $title = str_replace()
    $title = preg_replace("/\((.*)\)/i", "", $title);
    echo '<p class="name">'.  ucfirst(strtolower(($title))).'</p>
                <div>

                <ul class=\'p-icons\'>
                    <li><i class="glyphicon glyphicon-play"></i></li>
                    <li><i class="glyphicon glyphicon-eye-open"></i></li>
                    <li><i class="glyphicon glyphicon-plus"></i></li>
                    <li> <i class="glyphicon glyphicon-thumbs-up"></i></li>
            </ul>
                   <p class="description">Description of each videos goes heare undrer the video but when hover
                   decription cover pics</p>

                </div>
                                </div>';

    $iterator->next();
}