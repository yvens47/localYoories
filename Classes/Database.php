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
        $this->password= "yvenstij43gt";
        $this->db ="Yoories";
    }

    function connect(){
        $link = new mysqli($this->host, $this->user, $this->password, $this->db);
        return $link;
    }

    function query($sql){
         print_r($this->connect());
          $q = $this->connect()->query($sql) or die("unable to execute ");
          return $q;
    }

    function all($type){

        $sql = "select * from posts where type='$type'";


        $query = $this->query($sql);
        if(mysqli_num_rows($query)> 0){
            while($row = mysqli_fetch_assoc($query))
                $rows[] = $row;
            return $rows;
        }else{
            echo "not exist";
        }


    }

    function assocResult($query)
    {


        while ($rows = mysqli_fetch_assoc($query)) {
            $results[] = $rows;


        }
return $results;


    }

    /**
     * @param $query
     * @return bool
     */
    public function isEmpty($query)
    {
        $isgreater = false;
        if (mysqli_num_rows($query) > 0) {
            $isgreater =true;
        }


        return $isgreater;
    }


}