<?php


require_once 'Zend/Loader.php';

Zend_Loader::loadClass('Zend_Db');
$db = Zend_Db::factory('Mysqli',array(
    'host'     => '127.0.0.1',
    'username' => 'root',
    'password' => 'yvenstij43gt',
    'dbname'   => 'Yoories'
));

//$results = $db->fetchAll('select * from posts  where post_id= ?', 2);

//print_r($results);

$query = $db->query("select * from posts  where post_id= ?", array(2));


