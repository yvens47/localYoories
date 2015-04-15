<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 9:21 AM
 */


require_once "google/autoload.php";
class GoogleApi {



    private $youtube_object;
    private $client;
    private $service;
    private $db;
    function __construct() {
        $this->db = new Database('Yoories');

        $this->client = new Google_Client();

        $this->client->setApplicationName("Yoories");
        $this->client->setDeveloperKey("AIzaSyD4UsaxhiSdIIPS6wsVcWkCRxNw4qRvz-c");
        // parent::__construct($this->client);
        $this->service = new Google_Service_YouTube($this->client);

    }
    function showsAll(){
        $sql ="select * from videos";
        $query = $this->db->query($sql);
        while( $row = mysqli_fetch_assoc($query)){
            $id[] = $row['vidid'];            }
        return $id;
    }
    function vidInfo($id){

        echo "<iframe width=\"560\" height=\"315\" id=\"player\"
        src=\"https://www.youtube.com/embed/{$id}?autohide=1&enablejsapi=1&showinfo=0\"
       class=\"embed-responsive-item\" frameborder=\"0\" allowfullscreen ></iframe>";
    }

    function video($id){

        $videos = $this->service->videos->listvideos('snippet', array(
            'id'=>"$id",

        ));
        $iterator = new RecursiveArrayIterator ($videos['items']);

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



    }


    function addToFavs(){

    }

    function mostPopularYoutube(){
        $search = $this->service->search->listSearch('id, snippet',array(
            'q' =>'funny haitian videos',
            'maxResults'=>6,

            'order'=>'rating'
        ));

        $it = new RecursiveArrayIterator ($search['items']);
        while($it->valid()){
            $id = $it->current()['id']['videoId'];
            $title = $it->current()['snippet']['title'];
            $img = $it->current()['snippet']['thumbnails']['high']['url'];

            echo "<li>
                        <a href=\"profile.php?id=$id\">
                       <img src=\"$img\" alt=\"$title\">
                        </a>
                        <p class=\"ltitle\"> $title</p>
                </li>";

            $it->next();
        }

    }
    function playlist($id){
        $playlist =  $this->service->playlistItems->listPlaylistItems('id, snippet',
            array("playlistId"=>"$id",
                "maxResults"=>50));
        return $playlist['items'];
    }
    function save($id){
        $sql ="select * from videos where vidId ='$id'";
        if(mysqli_num_rows($this->db->query($sql)) == 0){
            // insert video id  to database
            $sql = "Insert into videos VALUE (NULL , '$id')";
            $q = $this->db->query($sql);
        };
    }
    function commentsfeed($id){
        Zend_Loader::loadClass("Zend_Gdata_YouTube");
        $yt = new Zend_Gdata_YouTube();
        $commentFeed = $yt->getVideoCommentFeed($id);
        foreach ($commentFeed as $commentEntry) {
            echo "<div>
                    <img src=\"\" class='picthumb'/>";
            echo "<p class='names'>".$commentEntry->author[0]->name->text."</p>";
            //echo $commentEntry->title->text . "<br/>";
            echo "<p class='body'>". $commentEntry->content->text . "</p>";
            echo $commentEntry->author[0]->uri->text. "\n";
            //echo $commentEntry->published->text. "\n";
            echo "</div>";
        }

    }
    function isVideoExists($id){
        $is =   $this->service->videos->listVideos("id, snippet", array(
            "id" =>"$id"
        ));
        $xist= false;
        if($is['pageInfo']['totalResults'] > 0){
            $xist = true;
        }
        return $xist;
    }


}