<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/14/15
 * Time: 5:09 AM
 */




require_once 'Database.php';
class HowTo {
    private $title;
    private $table = "posts";
    private $db;


    public function __construct(){
        $this->db = new Database();
        $this->db->connect();
    }

    function howtos(){
        $sql ="select * from how-tos";
        $query = $this->db->query($sql);

        while($row = mysqli_fetch_assoc($query)){
            $rows[] = $row;
        }

        return $rows;
    }


}