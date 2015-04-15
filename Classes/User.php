<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:45 AM
 */


require_once "Database.php";

class User extends Database
{

    function __construct()
    {
        parent::__construct();
    }

    function login($email, $password)
    {


        $email = $this->connect()->escape_string($email);
        $password = $this->connect()->escape_string($password);

        $sql = "select * from login where email ='$email' and password='$password'";
        $q = $this->query($sql);

        if ($q->num_rows > 0) {
            //login
            $result = $q->fetch_assoc();
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['email'] = $result['email'];
            header('location: app.php');

        } else {
            //login user
            //header("location: register.php");
            echo "email does not exist please click <a href='register.php'>register</a> to  ";

        }

    }

    function safe($string)
    {
        $s = $this->connect()->escape_string($string);

        return "'.$s'";
    }

    function register($email, $password)
    {

        $email = $this->connect()->escape_string($email);
        $password = $this->connect()->escape_string($password);

        $sql = "select email,password from login where email ='$email' and password='$password'";

        $q = $this->query($sql);

        if ($q->num_rows > 0) {
            echo "sorry username is existed";
        } else {
            $sql = "insert into login VALUE (null,'$email', '$password')";

            $q = $this->query($sql);
            if ($q) {
                header('location: login.php');
            }


        }

    }

    function isLogin()
    {

        $login = false;

        if (isset($_SESSION['email'])) {
            $login = true;
        }


        return $login;

    }

    function isAdmin()
    {

    }

    function edit()
    {

    }

}