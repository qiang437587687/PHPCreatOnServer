<?php
class Emp {
    public $name = "";
    public $hobbies  = "";
    public $birthdate = "";
}
$e = new Emp();
$e->name = "sachin";
$e->hobbies  = "sports";
//$e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
$e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
echo var_dump(json_decode($json, true));
echo "<br/>";



echo json_encode($e);
?>



