<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 5/10/15
 * Time: 8:15 PM
 */


require_once "Database.php";
class VidComment {

    private $id ;  // vidid

    private $body ; // comment text

    private $userid = null;

    private $db = null;


    function __construct($id, $body, $userid){

        $this->body = $body;
        $this->id = $id;

        $this->userid = $userid;
        $this->db = new Database();



    }

    function insert(){




        $sql = "SELECT * from Yoories.vidComment WHERE userid ={$this->userid}";
        echo $sql;
        $query = $this->db->query($sql);
        if($query->num_rows >= 1){

            echo "you've already posted a comment for this video";

        }else{
            $date = date('Y-m-d');

            echo $date;

            $sql = "INSERT INTO Yoories.vidComment VALUES
                    (null,'{$this->id}', '{$this->userid}','{$date}','{$this->body}')";
            $query = $this->db->query($sql);

            if($query)
                echo " your Comment has been added succesfully";
        }




    }



    function  __toString(){


        return  $this->id ." "." ".$this->body;

    }


}