<?php

class dbManage{

    protected $servername="localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = 'myDB';
    protected  $conn = '';

    function defaultFunc() {
        echo __FUNCTION__;
    }

    public function __construct() //初始化方法里面直接 直接初始化连接。
    {
        if(empty($this->conn))
        {
            $this->conn = mysqli_connect($this->servername,$this->username,$this->password);
        }
    }


    public function initDBManager() {
        //创建连接
        if (!$this->conn) {
            die("Connection failed:" . mysqli_connect_error());
        }

        echo "<br/>";
        echo "连接成功";
        echo "<br/>";

        $exist =  $this->DBExist();

        $exist ? $this->defaultFunc() : $this->creatDB();
    }

    public function creatDB() {
        // 创建数据库
        $sql = "CREATE DATABASE " . $this->dbname;

        if ($this->conn -> query($sql) == true) {
            echo '数据库创建成功';
        } else {
            echo 'Error creating database:' . $this->conn -> error;
        }
    }


    function DBExist() {
        $sqlE = "show databases like '$this->dbname'; "; //查询数据库是否存在

        if ($this->conn -> query($sqlE) == true) {
            echo "<br/>";
            echo '数据库存在';
            return true;
        } else {
            echo "<br/>";
            echo 'Error creating database:' . $this->conn -> error;
            return false;
        }
    }

}

$obj = new dbManage();
$obj->initDBManager();
$obj->creatDB();

?>