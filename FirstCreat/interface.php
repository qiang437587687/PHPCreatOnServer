<?php
/**
 * Created by PhpStorm.
 * User: zhangxianqiangmacbook
 * Date: 2018/3/20
 * Time: 上午11:03
 */

//定义一个接口
interface iTemplete {
    public function setVariable($name, $var);
    public function getHtml($templete);
}

class Templete implements iTemplete {
    private $vars = array();

    const constValue = "常量值constValue";
    public static $staticValue = "常量值staticValue";

    public function setVariable($name, $var)
    {
        // TODO: Implement setVariable() method.
        $this -> vars[$name] = $var;
    }

    public function getHtml($templete)
    {
        // TODO: Implement getHtml() method.
        foreach ($this ->vars as $name => $value) { // 注意这里面获取 $value的方式
            // 第一个参数是 寻找的字符串 第二个是 要替换的字符串  第三个是被查找的字符串
            $templete = str_replace('{' . $name . '}', $value, $templete);
        }

        return $templete;

    }

    public function tempTest(){

        $use = $this -> vars;
        $key = $use["zhang"];
        echo $key . '你妹的' . "</br>";
    }

    public function showConst() {

        echo "----start ----" . "<br>";
        echo  $this::constValue;
        echo  self::constValue;
        echo "----end ----" . "<br>";

        echo "----start ----" . "<br>";
        echo  self::$staticValue;
        echo  $this::$staticValue;
        echo "----end ----" . "<br>";

        return self::$staticValue;
    }

}

$object = new Templete();
$object ->setVariable("zhang","xianqiang");
$object ->setVariable("han","er");
$object ->setVariable("ni","mei");

$uu = $object ->getHtml('fhgj{zhang}');

echo $uu;
echo "<br>";

$object ->tempTest();

echo $object->showConst();

?>

