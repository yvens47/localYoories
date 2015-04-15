<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 9:21 AM
 */


require_once "google/src/Google/autoload.php";
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
        $options = array('id'=>$id, );
        $youtube = $this->service->videos->listVideos('id, snippet', $options);

        $items = $youtube['items'];
        //print_r($items);
       // $id = $items['snippet']['id'];


        foreach($items as $item){
            $id  =  ($item['id']);
            $title = $item['snippet']['title'];
            $descr = $item['snippet']['description'];
            $image = $item['snippet']['thumbnails']['high']['url'];
            $channelTitle = $item['snippet']['channelTitle'];
            echo "<div class='tends>";
            echo $channelTitle."<br/>";
            echo  "<img src='$image'/>";
            echo $title ."<br/>";
            echo $descr;
            echo "<hr/>";
            echo "</div>";

        }

    }


}