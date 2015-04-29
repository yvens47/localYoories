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

          $q = $this->connect()->query($sql) or die("Unable to Execute Query");

          return $q;
    }

    function all($type){

        $sql = "select * from posts where catID='$type'";
        $query = $this->query($sql);

        if($query->num_rows >= 1){
            return $query->fetch_all(MYSQL_ASSOC);
        }
        return 0;




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