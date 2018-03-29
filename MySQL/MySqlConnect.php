<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'myDB';

//创建连接
$conn = mysqli_connect($servername,$username,$password);

if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
}

echo "<br/>";
echo "连接成功";
echo "<br/>";

$exist =  DBExist();

$exist ? defaultFunc() : creatDB();

mysqli_close($conn);

function defaultFunc() {
    echo __FUNCTION__;
}

function creatDB() {
    // 创建数据库
    $sql = "CREATE DATABASE " . $dbname;

    if ($conn -> query($sql) == true) {
        echo '数据库创建成功';
    } else {
        echo 'Error creating database:' . $conn -> error;
    }
    // 。。。。
}


function DBExist() {
    $sqlE = "show databases like '$dbname'; "; //查询数据库是否存在

    if ($conn -> query($sqlE) == true) {
        echo "<br/>";
        echo '数据库存在';
        return true;
    } else {
        echo "<br/>";
        echo 'Error creating database:' . $conn -> error;
        return false;
    }
}


?>