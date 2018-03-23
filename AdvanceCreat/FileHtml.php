<html>
<body>

<?php
$file=fopen("text.txt","r") or exit('Unable to open file');
$fileRRR=fopen("text.txt","r") or exit('Unable to open file');

echo $file;


while (!feof($file)) {
    echo fgets($file)."<br>";
}


while (!feof($fileRRR)) {
    echo fgetc($fileRRR); // 按照word来搞起来。
}

fclose($file); //关闭文件
?>

</body>
</html>