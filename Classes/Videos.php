<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/13/15
 * Time: 8:54 PM
 */


require_once 'Database.php';
class Videos  {

    private  $db;


    function __construct(){

        $this->db = new Database();
        $this->db->connect();
    }

    function videoIds(){

        $sql = "select vidid from videos";

        $query = $this->db->query($sql);

        while($row = mysqli_fetch_assoc($query)){
            $rows[] = $row;
        }

        return $rows;
    }

}