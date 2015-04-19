<?php


if($this->type =='posts'){
    $this->setType('article');
    $this->posts();


}
else if($this->type == 'how-to'){

    $this->setType('how-to');
    $this->posts();

}else if($this->type='jokes'){
    echo $this->type;

    //$this->setType('jokes');//
    echo $this->getType();
    $this->posts();
}else if($this->type='tips'){
    $this->setType('tips');
    $this->posts();
}


else{

    //header('location: Articles.php?type=posts');

    $this->posts();

    $post = $this->db->all('posts');
    $how = $this->db->all('how');

    $data = array_merge($post, $how);


    return $data;
}

