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
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    private $title;
    private  $description;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
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
        $options = array('id'=>$id, );

        $youtube = $this->service->videos->listVideos('id, snippet', $options);
        $desc =  $youtube['items'][0]['snippet']['description'];
        $this->setDescription($desc);
        print_r($desc);
        $this->setId($id);


        echo "<iframe width=\"560\" height=\"315\" id=\"player\"
        src=\"https://www.youtube.com/embed/{$id}?autohide=1&enablejsapi=1&showinfo=0\"
       class=\"embed-responsive-item\" frameborder=\"0\" allowfullscreen ></iframe>";
    }

     function comments(){
         $options = array(
             'videoId'=>$this->getId(),
             'textFormat' => 'plainText',
             );


         $comments = $this->service->commentThreads->listCommentThreads('id, snippet',$options);

         //print_r($comments);

         foreach($comments as $comment){
            // print_r($comment);
             $c = $comment['snippet']['topLevelComment']['snippet']['textDisplay'];
             $authorDisplayName =$comment['snippet']['topLevelComment']['snippet']['authorDisplayName'];
             $authorDisplayImage =$comment['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'];
             echo "<div class='comment'>";
             echo "<img src='$authorDisplayImage'>'";
             echo "<p> $authorDisplayName</p>";
              echo "<p> $c </p>";

             echo "</div>";
         }

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


          echo  "<div class=\"trends thumbnail\">
                            <a href=\"video.php?id=$id\">
                            <img src=\"$image\" alt=\"LA MEDAILLE (FULL HAITIAN MOVIE)\"></a> <p class=\"name\">La medaille </p>
                <div>

                <ul class=\"p-icons\">
                    <li><i class=\"glyphicon glyphicon-play\"></i></li>
                    <li><i class=\"glyphicon glyphicon-eye-open\"></i></li>
                    <li><i class=\"glyphicon glyphicon-plus\"></i></li>
                    <li> <i class=\"glyphicon glyphicon-thumbs-up\"></i></li>
            </ul>
                   <p class=\"description\">$descr</p>

                </div>
                                </div>";

        }

    }


}