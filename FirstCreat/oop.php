<?php

class Site {

    var $url;
    var $title;

    function setUrl($par){
        $this->url = $par;
    }

    function setTitle($p){
        $this->url = $p;
    }

    function getUrl() {
        echo $this->url . PHP_EOL;
    }

    // 这个是类的构造函数

    function __construct()
    {
        echo __FUNCTION__ . PHP_EOL;
    }

    // 析构函数
    function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo __FUNCTION__ . PHP_EOL;
    }

    private function privateFunc() {
        echo __FUNCTION__ . PHP_EOL;
    }

}

//继承

class Child_site extends Site {

    var $category;

    function child_setCategory($par){
        $this->category = $par;
    }

    function getCate(){
        echo $this->category . PHP_EOL;
    }

    function getUrl()
    {
        parent::getUrl(); // TODO: Change the autogenerated stub
        echo "<br>";
        echo "echo child get URL";
        echo "<br>";
    }
//    func priv ---- privateFunc 这个方法是private的不能进行重写啊啊啊啊 子类也不能进行调用~
}




$taobao = new Site();
$taobao->setUrl("urllll");
echo "nimei" . PHP_EOL;

$taobao->getUrl();

/*
$child = child_site::class;
var_dump($childInstance);
$childInstance = new $child();
//$childInstance->getUrl();
*/

$child = new Child_site();

$child -> getUrl();




?>