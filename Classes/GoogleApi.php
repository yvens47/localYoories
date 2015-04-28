<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 9:21 AM
 */


require_once "google/src/Google/autoload.php";
require_once 'Credentials.php';

class GoogleApi
{


    private $youtube_object;
    private $client;
    private $service;
    private $db;
    private $id;
    private $countComments;

    private $paginToken;

    /**
     * @return mixed
     */
    public function getCountComments()
    {
        return $this->countComments;
    }

    /**
     * @param mixed $countComments
     */
    public function setCountComments($countComments)
    {
        $this->countComments = $countComments;
    }

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
    private $description;

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

    function __construct()
    {
        $this->db = new Database('Yoories');

        $this->client = new Google_Client();

        $this->client->setApplicationName("Yoories");

        $this->client->setClientId(CLIENT_ID);
        $this->client->setClientSecret(CLIENT_SECRET);
        $this->client->setDeveloperKey(DEVELOPER_KEY);
        $this->client->setApprovalPrompt('force');
        $scope = array("https://www.googleapis.com/auth/youtube.force-ssl","https://www.googleapis.com/auth/youtube");
        $this->client->setScopes($scope);
        // parent::__construct($this->client);

        $this->service = new Google_Service_YouTube($this->client);


    }


    function showsAll()
    {
        $sql = "select * from videos";
        $query = $this->db->query($sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $id[] = $row['vidid'];
        }
        return $id;
    }

    function isVideoFound($id){
        $isfound = true;
        $options = array('id' => $id,);
        $youtube = $this->service->videos->listVideos('id, snippet', $options);

        if (!$youtube['pageInfo']['totalResults'] >0 )
                $isfound = false;


        return  $isfound;

    }

    function vidInfo($id)
    {

            $options = array('id' => $id,);

            $youtube = $this->service->videos->listVideos('id, snippet', $options);
            $desc = $youtube['items'][0]['snippet']['description'];
            $this->setDescription($desc);
            print_r($desc);
            $this->setId($id);


            echo "<iframe width=\"560\" height=\"315\" id=\"player\"
        src=\"https://www.youtube.com/embed/{$id}?autohide=1&enablejsapi=1&showinfo=0\"
       class=\"embed-responsive-item\" frameborder=\"0\" allowfullscreen ></iframe>";




    }

    function postComment($vidid,$comment){
        # Insert channel comment by omitting videoId.
        # Create a comment snippet with text.
        $commentSnippet = new Google_Service_YouTube_CommentSnippet();
        $commentSnippet->setTextOriginal(
            'my comment'
        );

        # Create a top-level comment with snippet.
        $topLevelComment = new Google_Service_YouTube_Comment();
        $topLevelComment->setSnippet($commentSnippet);

        # Create a comment thread snippet with channelId and top-level comment.
        $commentThreadSnippet = new Google_Service_YouTube_CommentThreadSnippet();
        $commentThreadSnippet->setTopLevelComment($topLevelComment);

        # Create a comment thread with snippet.
        $commentThread = new Google_Service_YouTube_CommentThread();
        $commentThread->setSnippet($commentThreadSnippet);

        // Call the YouTube Data API's commentThreads.insert method to create a comment.
        $channelCommentInsertResponse = $this->service->commentThreads->insert('snippet', $commentThread);


        # Insert video comment
        $commentThreadSnippet->setVideoId($vidid);
        // Call the YouTube Data API's commentThreads.insert method to create a comment.
        $videoCommentInsertResponse = $this->service->commentThreads->insert('snippet', $commentThread);

    }

    function comments()
    {
        $options = array(
            'videoId' => $this->getId(),
            'textFormat' => 'plainText',
        );


        $comments = $this->service->commentThreads->listCommentThreads('id, snippet', $options);

        //print_r($comments);
        $this->setCountComments(count($comments));

        //echo $this->getCountComments()." coomments";

        foreach ($comments as $comment) {
            // print_r($comment);
            $c = $comment['snippet']['topLevelComment']['snippet']['textDisplay'];
            $authorDisplayName = $comment['snippet']['topLevelComment']['snippet']['authorDisplayName'];
            $authorDisplayImage = $comment['snippet']['topLevelComment']['snippet']['authorProfileImageUrl'];
            echo "<div class='comment'>";
            echo "<div class=\"comment-pic pull-left\"><img src='$authorDisplayImage'></div>";
            echo "<div class='p-comment'><p class='name'> $authorDisplayName</p>";
            echo "<p> $c </p>
                    <ul class='p-icons'>

                        <li><i class=\"glyphicon glyphicon-thumbs-down\"></i></li>
                        <li> <i class=\"glyphicon glyphicon-thumbs-up\"></i></li>
                    </ul>
                    </div>";

            echo "</div>";
        }

    }


    function mostPopularYoutube($num){
        $randSearch =  array('funny haitian videos', 'hatian jokes', 'haitian meem');
        $randNum = rand(0, count($randSearch)-1);
        $search  = $this->service->search->listSearch('id, snippet',array(
            'q' =>$randSearch[$randNum],
            'maxResults'=>$num,

            //'order'=>'rating'
        ));

        $it = new RecursiveArrayIterator ($search['items']);
        while($it->valid()){

            $id =  $it->current()['id']['videoId'];
            $title = $it->current()['snippet']['title'];
            $img = $it->current()['snippet']['thumbnails']['high']['url'];
            $description = $it->current()['snippet']['description'];
             $title = strtolower(substr($title, 0 ,90)."...");

            echo "<li>
                        <a href=\"video.php?id=$id\">
                       <img src=\"$img\" alt=\"title\">
                        <p class=\"ltitle\"> $title</p>

                        </a>

                </li>";

            $it->next();
        }


    }

    /*
     * @param $id  video id of the youtube vider
     * return array : of a youtube video, description and title
     */

    function  features($id)
    {
        $options = array('id' => $id,);
        $youtube = $this->service->videos->listVideos('id, snippet', $options);
        $items = $youtube['items'];

        $videos = array();
        foreach ($items as $item) {
            $id = ($item['id']);
            $title = $item['snippet']['title'];
            $descr = $item['snippet']['description'];
            $image = $item['snippet']['thumbnails']['high']['url'];
            $channelTitle = $item['snippet']['channelTitle'];

            $it = array($id, $title, $descr, $image, $channelTitle);

           //array_merge( $it, $videos);

             array_push($videos, $it);

        }

        return ($videos);

    }


    function video($id)
    {
        $options = array('id' => $id,);
        $youtube = $this->service->videos->listVideos('id, snippet', $options);

        $items = $youtube['items'];



        foreach ($items as $item) {
            $id = ($item['id']);
            $title = $item['snippet']['title'];
            $descr = $item['snippet']['description'];
            $image = $item['snippet']['thumbnails']['high']['url'];
            $channelTitle = $item['snippet']['channelTitle'];


            echo "<div class=\"trends thumbnail\">
                            <a href=\"video.php?id=$id\">
                            <img src=\"$image\" alt=\"LA MEDAILLE (FULL HAITIAN MOVIE)\"></a> <p class=\"name\">$title </p>
                <div>

                <ul class=\"p-icons\">
                    <li><i class=\"glyphicon glyphicon-play\"></i></li>
                    <li><i class=\"glyphicon glyphicon-eye-open\"></i></li>
                    <li><i class=\"glyphicon glyphicon-plus add\" data-title=\"$title\" data-id=\"$id\"></i></li>
                    <li> <i class=\"glyphicon glyphicon-thumbs-up\"></i></li>
            </ul>
                   <p class=\"description\">$descr</p>

                </div>
                                </div>";

        }



    }


    function saveToWatchList($title, $movieid){
         // check if videoid is already existed
        $email = $_SESSION['email'];

        $sql = "select movie_id  from watchlist  where movie_id ='$movieid' AND email='$email'";

        $query = $this->db->query($sql);

        if(mysqli_num_rows($query) > 0){
            echo "already Added";

        }else{

            $sql = "insert into watchlist VALUES (null, '$title', '$movieid','$email')";
            $query = $this->db->query($sql);
            if($query)
                echo "Movie has been added to watchlist";
        }
    }

    function viewWatchList(){

        $email = isset($_SESSION['email']) ? $_SESSION['email']: "fake@gmail.com";

        $sql = "SELECT movie_id FROM watchlist WHERE email ='$email'";
        $query = $this->db->query($sql);

        if(mysqli_num_rows($query)  == 0){


            return  0 ;
        }else if(mysqli_num_rows($query) == 1){
            return mysqli_fetch_assoc($query);
        }else{
            while($row = mysqli_fetch_assoc($query)){
                $rows[] = $row;
            }

            return($rows);
        }

    }


}