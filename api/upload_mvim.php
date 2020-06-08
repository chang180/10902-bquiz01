<?php
include_once "../base.php";

// echo $_POST['id'];
$mvim=new DB('mvim');
$row=$mvim->find($_POST['id']);

if(!empty($_FILES['img']['tmp_name'])){
    $filename=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$filename);
    $row['img']=$filename;
    $mvim->save($row);
}

to("../admin.php?do=mvim");

?>