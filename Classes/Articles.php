<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/14/15
 * Time: 4:56 AM
 */

require_once 'Database.php';
require_once 'Post.php';



class Articles {
    private  $type;


    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    private $db;

    function __construct($type){
        $this->type = $type;
        $this->db = new Database();
        $this->db->connect();
    }

    function create(){

        $post = new Post();
        return $post;
    }

    function article(){
        $string = $_SERVER['QUERY_STRING'];
        $s = explode('=', $string);

        $type =  $s[0];
        $sql ="select * from ";
        if($type =='post_id'){
            $id = $_GET['post_id'];
            $sql .= "posts where post_id ='$id'";

        }
        else{
            $id = $_GET['id'];
            $sql .= "how where id='$id'";
        }

        $q = $this->db->query($sql);

        if(mysqli_num_rows($q)>0){

            return mysqli_fetch_assoc($q);

        }else{
            echo "posts does not found";
        }




    }

    function comments($id){


        $sql = "select * from Comments where postid = '$id'";
        $query = $this->db->query($sql);
        echo $this->db->isEmpty($query);
        if($this->db->isEmpty($query)){
            $c = ($this->db->assocResult($query));

            return $c;
        }

        else{
              return "no comment yet";
        }





        //$comment = Factory::Comment($id, $title, $body, $postid);


    }

    function isArray($data){
        $isArray = false;
        if(is_array($data))
            $isArray =  true;
        return $isArray;
    }

    function displayArticles(){

        if($this->type == 'posts'){
            $this->setType('article');
            $this->posts();


        }
        else if($this->type == 'how-to'){

            $this->setType('how-to');
            $this->posts();

        }else if($this->type='tips'){
            $this->setType('tips');
            $this->posts();
        }


        else{

            //header('location: Articles.php?type=posts');

            $this->posts();

            $post = $this->db->all('posts');
            $how = $this->db->all('how');

            $data = array_merge($post, $how);


            return $data;
        }


    }
    function  edit($id){
        //$this->posts();

        $sql  ="select * from posts where post_id ='$id'";
        $query = $this->db->query($sql);

        return mysqli_fetch_assoc($query);

    }


    function  howTos(){

    }

    public function posts()
    {
//print_r($this->db->all('posts'));
        $data = ($this->db->all($this->type));
        // $data = $articles->displayArticles();
        foreach ($data as $article) {
            $id = $article['post_id'];
            $title = $article['title'];
            $param = key($article);
            $body = substr($article['body'], 0, 100);
            echo "
                            <div class='p-wrap'>
                               <a href=\"article.php?post_id=$id\"><img  class='post-img' src='http://yoories.com/pic.png' /></a>
                                <div><h2><a href=\"article.php?post_id=$id\">$title</a></h2>
                                <p> $body</p>
                                </div>
                                <div class='icns'>
                                <i class='pull-right glyphicon glyphicon-thumbs-up'></i>
                                <i class='pull-right glyphicon glyphicon-thumbs-down'></i>
                                <i class='pull-right glyphicon glyphicon-share'></i>
                                <i class='pull-right glyphicon glyphicon-bell'></i>
                                <i class='pull-right glyphicon glyphicon-comment'></i>
                                </div>
                            </div>
                            ";
        }
        $this->db->connect()->close();
    }

}
