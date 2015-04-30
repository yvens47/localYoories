<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/27/15
 * Time: 1:16 AM
 */



require_once 'Zend/Loader.php';

Zend_Loader::loadClass('Zend_Db');




class Subscriber {

    private $db ;
     private $email ;

    function __construct($email){
        $this->db = Zend_Db::factory('Mysqli',array(
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => 'yvenstij43gt',
            'dbname'   => 'Yoories'
        ));


        $this->email = $email;
    }


    function subscribe(){
        $sql = "select email from subscriber where email = ? ";
         $p =  $this->db->query($sql, $this->email);
         if(($p->rowCount() > 0) ){
             die("already subscribe");
         }else{
             $sql = "INSERT INTO subscriber (id,email) VALUES (?,?)";
             $query = $this->db->query($sql, array(null, $this->email));
             if($query)
                 echo "You have been subscribed successfully ";
         }

    }

    function unsubscribe(){

    }


}