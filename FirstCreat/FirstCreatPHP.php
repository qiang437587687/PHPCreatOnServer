<?php
/**
 * Created by PhpStorm.
 * User: zhangxianqiang
 * Date: 2018/3/19
 * Time: 22:33
 */

echo "first creat";

$n = 1;

switch ($n)
{
    case "1":
        echo "999";
        break;
    case "2":
        echo "555";
        break;
    default:
        echo "default";
}


$cars = array("Volvo", "BMW", "toyota");
echo "<br/>";
echo "数组的个数是： ";
echo count($cars);
//echo count($cars);

echo "<br/>";

for ($x = 0; $x < count($cars); $x++){
    echo $cars[$x];
    echo "<br>";
}


$x = 75;
$y = 25;

function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}

addition();

echo $z;
echo "<br/>";
echo $x;

echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
//echo $_SERVER['HTTP_REFERER'];
//echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo $_SERVER['SERVER_ADDR'];

echo "<br>";

// for 循环练习，注意这个的位置和swift是相反的
$zx = array("one","two","three");
foreach ($zx as $value) {
    echo $value . "<br>"; // 。 的意思是连接符号？
}

// 函数的返回值

function add($x, $y){
    $total = $x + $y;
    return $total;
}

echo "你妹的" . add(18,19) . "<br>";

?>

