<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/16/15
 * Time: 7:51 PM
 */

require_once 'PostImp.php';
class Comment implements PostImp {
    private $id;
    private $title;
    private $body;
    private $postid;

    function __construct($id,  $body)
    {
        $this->id = $id;

        $this->body = $body;

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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getPostid()
    {
        return $this->postid;
    }

    /**
     * @param mixed $postid
     */
    public function setPostid($postid)
    {
        $this->postid = $postid;
    }

    function createPost($id, $body){
        $comment = new Comment($id, $body);
        return $comment;
    }






}