<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/14/15
 * Time: 3:32 AM
 */

require_once 'Database.php';
class Post {
    private $title;
    private $table = "posts";
    private $db;
    private $id;
    private $body;
    private $last_insert_id;

    /**
     * @return mixed
     */
    public function getLastInsertId()
    {
        return $this->last_insert_id;
    }

    /**
     * @param mixed $last_insert_id
     */
    public function setLastInsertId($last_insert_id)
    {
        $this->last_insert_id = $last_insert_id;
    }


    public function __construct(){
        $this->db = new Database();
        $this->db->connect();
    }

    function edit($id, $title, $body){

        $body = $this->db->connect()->real_escape_string($body);
        $sql = "UPDATE `Yoories`.`posts` SET `title` = '$title',`body` = '$body' WHERE `posts`.`post_id` = '$id'";
       // echo $sql;
        $query = $this->db->query($sql);
        if($query)
            echo "udpated success fully";

        $this->db->connect()->close();

    }

    function addMultiple($array){


    }

    function delete($id){
        $sql ="DELETE FROM `Yoories`.`posts` WHERE `posts`.`post_id` = $id";
        $query = $this->db->query($sql);


        if($query)
            echo "udpated success fully";

    }

    function posts(){
        $sql ="select * from posts";
        $query = $this->db->query($sql);

        while($row = mysqli_fetch_assoc($query)){
            $rows[] = $row;
        }

        return $rows;


    }

    function add($post, $image){
        $title = $post['title'];
        $body = $post['body'];
        $date = date('Y-m-d H:i:s');

        $catego = $post['category'];

        $sql  = "insert into posts VALUES (null, '$title', '$body', '$date', '$image', '$catego')";

        echo $sql;
        $query = $this->db->query($sql);
        if($query){
            echo " Inserted Successfully";
        }



    }




}

