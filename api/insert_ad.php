<?php
include_once "../base.php";

$table=$_POST(['table']);
$db=new DB($table);


$text=$_POST['text'];

$sh=0;

$db->save(['text'=>$text,'sh'=>$sh]);
to("../admin.php?do=ad");


?>