<?php
/**
 * Created by PhpStorm.
 * User: jeanypierre
 * Date: 4/17/15
 * Time: 12:19 AM
 */

require_once "../Config.php";
class ImageUpload {

    private $name;
    private $type;
    private $size;
    private $tmp_name;
    const MAX_SIZE = 800000;
    private $error;

    public $extensiton = array('image/png','image/jpg','image/jpeg','image/gif');


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getTmpName()
    {
        return $this->tmp_name;
    }

    /**
     * @param mixed $tmp_name
     */
    public function setTmpName($tmp_name)
    {
        $this->tmp_name = $tmp_name;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    function __construct($image){
         // $this->name = $image['image']['name'];
        $this->name= ($image['image']['name']);
        $this->tmp_name = $image['image']['tmp_name'];
        $this->type = $image['image']['type'];
        $this->error = $image['image']['error'];
        $this->size = $image['image']['size'];

    }

    function checkSize(){
        $size = true;

       if($this->getSize() > self::MAX_SIZE){
            $size = false;
       }
        return $size;

    }

    function checkExtension(){
         return (in_array($this->getType(), $this->extensiton));



    }

    function saveImage($directory){

        $dir = ROOTPATH."/".$directory."/";
        $isSave = false;


        if(!file_exists($dir.$this->getName())){
            if(move_uploaded_file($this->getTmpName(), $dir.$this->getName())){

                return  true ;
            }
        }
        else{

            die("file is exist");
        }


    }

     function saveMultiple(){

     }


}


