<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/12/15
 * Time: 10:45 AM
 */


require_once "Database.php";
require_once './google/src/Google/autoload.php';
require_once 'Credentials.php';

class User extends Database
{

    private  $service ;
    private $client;

    function __construct()
    {
        parent::__construct();

        $this->client = new Google_Client();
        $this->client->setClientSecret(CLIENT_SECRET);
        $this->client->setClientId(CLIENT_ID);
        $this->client->setDeveloperKey(DEVELOPER_KEY);
        $this->client->setRedirectUri(REDIRECT);
        $this->client->setApprovalPrompt('force');
        $this->client->setApplicationName("Yoories");

        $scope = array("https://www.googleapis.com/auth/userinfo.email","https://www.googleapis.com/auth/plus.me");
        $this->client->setScopes($scope);
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

    function gooleLogin(){



       // print_r($this->client);
        $google_auth = new Google_Auth_OAuth2($this->client);
        if (isset($_REQUEST['logout'])) {
            // Clear the access token from the session storage.
            unset($_SESSION['token']);
        }
        if(isset($_GET['code'])){
            $this->client->authenticate($_GET['code']);
            $_SESSION['token'] = $this->client->getAccessToken();
            //$this->client->refreshToken($_SESSION['token']);

            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));

        }

        if(isset($_SESSION['token']) && $_SESSION['token']){
            $this->client->setAccessToken($_SESSION['token']);


            echo "Logged in <a href='logout.php' class='google-login'>Logout</a>";




        }else{
            $url =$this->client->createAuthUrl();

            echo "<a href=\"$url\">Login with Google</a>";
        }

        if($this->client->getAccessToken()){


            $_SESSION['access_token'] = $this->client->getAccessToken();
            $token_data = $this->client->verifyIdToken()->getAttributes();

            print_r($token_data);

        }









    }

}


