<?php

class dbManage{

    protected $servername="localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = 'myDB';
    protected  $conn = '';

    function defaultFunc() {
        echo "<br/>";
        echo "默认方法: ";
        echo __FUNCTION__;
        echo "<br/>";
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

        $exist ? ($this->defaultFunc()) : ($this->creatDB());
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

    function creatTable() {

        mysqli_select_db($this->conn,$this->dbname);

        $testSql = "SELECT information_schema.SCHEMATA.SCHEMA_NAME 
                    FROM information_schema.SCHEMATA 
                    where SCHEMA_NAME='MyGuests';";

        if ($this->conn -> query($testSql) == true) {
            echo "table MyGuests exist";
            return;
        }

        $sql =  "CREATE TABLE MyGuests (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP
                )";

        if ($this->conn -> query($sql) == true) {
            echo "Table MyGuests created successfully";
        } else {
            echo "创建数据表错误: " . $this->conn->error;
        }
    }

    // 添加数据
    function addNewData($firstName,$lastname,$email) {

//        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//                VALUES ($firstName, $lastname, $email)";

        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
                VALUES ('$firstName', '$lastname', '$email')";

        if ($this->conn->query($sql) === TRUE) {
            echo "<br/>";
            echo "新记录插入成功";
        } else {
            echo "<br/>";
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }

        //执行 多个sql 注意其中的 multi_query！

//        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
//          VALUES ('John', 'Doe', 'john@example.com');";
//        $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
//          VALUES ('Mary', 'Moe', 'mary@example.com');";
//        $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
//          VALUES ('Julie', 'Dooley', 'julie@example.com')";
//
//        if ($conn->multi_query($sql) === TRUE) {
//            echo "新记录插入成功";
//        } else {
//            echo "Error: " . $sql . "<br>" . $conn->error;
//        }
    }

    function readMessage() {
        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = mysqli_query($this->conn, $sql);
        echo "<br/>";
        echo "开始阅读数据:";
        echo "<br/>";
        if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 结果";
        }
    }

    function readMessageUseWhere() {
        $sql = "SELECT * FROM MyGuests WHERE id>6";
        $result = mysqli_query($this->conn,$sql);

        if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        } else {
            echo "0 结果";
        }
    }
    // SELECT column_name(s) FROM table_name ORDER BY column1, column2  第一列的值相同时才使用第二列：

    function readMessageUseOrderBy() {
        echo "<br/>";
        $sql = "SELECT * FROM MyGuests ORDER BY firstname";
        $result = mysqli_query($this->conn,$sql);

        if (mysqli_num_rows($result) > 0 ) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            }
        }

    }

    function updateMessage() { //更新数据

        echo "<br/>";
        //$sql =  "UPDATE MyGuests SET firstname='Johndddd' WHERE FirstName='John' AND LastName='Doe'";
        $sql =  "UPDATE MyGuests SET firstname='John------mmmmm' WHERE id=6";

        $result = mysqli_query($this->conn,$sql);

        if ($result) {
            echo 'update success';
        } else {
            echo 'update failed';
        }
    }

    function deleteMessage() {

        $result = mysqli_query($this->conn,"DELETE FROM MyGuests WHERE firstname='zhang1'");

        if ($result) {
            echo 'update success';
        } else {
            echo 'update failed';
        }
    }


    function closeDataBase() {
        mysqli_close($this->conn);
    }

}

$obj = new dbManage();
$obj->initDBManager();
$obj->creatTable();
$obj->addNewData("zhang1","xianqiang1","emaiddddxl@qq.com1");
$obj->readMessage();
$obj->readMessageUseWhere();
$obj->readMessageUseOrderBy();
$obj->updateMessage();
$obj->deleteMessage();

$obj->closeDataBase();

?>


