<?php
/**
 * Created by PhpStorm.
 * User: zhangxianqiang
 * Date: 2018/3/19
 * Time: 23:55
 */
// namespace 必须是程序脚本的第一条语句 所有非php语句和空白符号都不能出现在
// 命名空间以前。
declare(encoding='UTF-8');
namespace MyProject {
    const connect_ok = 1;
    class Connection {
        function sayConnection() {
            echo "success";
        }
    }

}

namespace {
    session_start();
    $a = MyProject\Connection::sayConnection();
    $b = MyProject\Connection::class;

    class Qiang{
        function zhang() {
            echo "zhang";
        }
    }

    $m = new Qiang();
    var_dump($m);
    $m->zhang();
//    echo $a->
}
?>