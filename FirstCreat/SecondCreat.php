<!--<html>-->
<!--<body>-->
<!---->
<!--<form method="post" action="--><?php //echo $_SERVER['PHP_SELF'];?><!--">-->
<!--    Name: <input type="text" name="fname">-->
<!--    <input type="submit">-->
<!--</form>-->
<!---->
<?php
//$name = $_POST['fname'];
//echo $name;
//?>
<!---->
<!--</body>-->
<!--</html>-->


<?php
$i=1;
while($i<=5)
{
    echo "The number is " . $i . "<br>";
    $i++;
}

echo '这是第 " '  . __LINE__ . ' " 行';
echo "<br>";
echo '该文件位于 " '  . __FILE__ . ' " ';
echo "<br>";
echo '该文件位于 " '  . __DIR__ . ' " ';
echo "<br>";

function test() {
    echo  '函数名为：' . __FUNCTION__ ;
}
test();


class test {
    function _print() {
        echo '类名为：'  . __CLASS__ . "<br>";
        echo  '函数名为：' . __FUNCTION__ ;
    }
}
$t = new test();
$t->_print(); //s

echo "<br>";

class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld { //对方法的重写，注意这里面的parent
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

echo "<br>";

class Zhang {
    public function sayZhang(){
        echo "zhang";
    }
}

trait Szhang {
    public function sayZhang() {
        parent::sayZhang();
        echo "xianqiang";
    }
}

class Qiang extends Zhang {
    use Szhang;

}

$h = new Qiang();
$h ->sayZhang();




?>

