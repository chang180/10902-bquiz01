<?php
include_once "../base.php";

// echo $_POST['id'];
$title=new DB('title');
$row=$title->find($_POST['id']);

if(!empty($_FILES['img']['tmp_name'])){
    $filename=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$filename);
    $row['img']=$filename;
    $title->save($row);
}

to("../admin.php?do=title");

?>