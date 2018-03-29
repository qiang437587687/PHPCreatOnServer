<?php

echo "<br/>";

if (!file_exists('welcome.txt')) {
    die("文件不存在");

} else {
    $file  = fopen("welcome.txt",'r');

    while (!feof($file)) {
        echo fgets($file);
        echo "<br/>";
    }
    fclose($file);
}

?>


