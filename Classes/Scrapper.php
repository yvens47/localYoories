<?php


class Scrapper{
    private $url;  //http://rnhsite.azurewebsites.net/?cat=21
    private  $dom;

    var $base ='http://www.radiotelevisioncaraibes.com/';
    private $db;
    function __construct($url){
        $this->url = $url;

    }

    function getUrl($url){
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);

        $results = curl_exec($ch); // Executing cURL session

        curl_close($ch); // Closing cURL session

        return $results; // Return the results
    }


    function document($dom){
        $this->dom = new DomDocument();
        @$this->dom->loadHtml($dom);

        $xpath = new DOMXPath($this->dom); // Instantiating new

        return $xpath;

    }


}


$s = new Scrapper('http://www.radiotelevisioncaraibes.com/');




print_r($s);
$d = $s->document($s->getUrl("http://www.movielakay.com/category/blog/"));


$q = $d->query('//*[@id="content"]/div[3]/div/div');

//echo ($q->item(0)->nodeValue);

echo  trim(($q->item(0)->nodeValue));

echo $q->item(0)->firstChild();


