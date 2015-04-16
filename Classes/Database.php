<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:47 AM
 */

class Database {

    private $host;
    private $password;
    private  $user;
    private $db;

    function __construct(){
        $this->host= "localhost";
        $this->user = "root";
        $this->password= "";
        $this->db ="Yoories";
    }

    function connect(){
        $link = new mysqli($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    function query($sql){
          $q = $this->connect()->query($sql) or die("unable to execute ");
          return $q;
    }

    function all($type){

        $sql = "select * from posts where type='$type'";


        $query = $this->query($sql);
        while($row = mysqli_fetch_assoc($query))
            $rows[] = $row;
        return $rows;
    }

    function assocResult(){

    }


}