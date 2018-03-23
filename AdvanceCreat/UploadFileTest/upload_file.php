<?php

$allowedExts = array('gif', 'gpeg', 'jpg', 'png');
$temp = explode('.',$_FILES["file"]['name']);
$extension = end($temp); //文件后缀

if (in_array($extension, $allowedExts)) { //判断是不是在数组里面
    upLoad();
} else {
    echo "非法文件格式";
}

function upLoad() {

    if ($_FILES["file"]["error"] > 0) {

        echo "错误" . $_FILES["file"]["error"] . "<br>";

    } else {

        echo "上传文件名" . $_FILES['file']['name'].'<br>';
        echo "文件类型" . $_FILES['file']['type'].'<br>';
        echo "文件大小" . ($_FILES['file']['size'])/1024 . 'kb<br>';
        echo "文件临时存储位置" . $_FILES['file']['tmp_name'] . '<br>'; // 这里注意一下tmp 不是 temp

        if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"]."文件已经存在";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
            echo "文件存储到:" . "upload/" . $_FILES["file"]["name"];
        }
    }
}
?>


