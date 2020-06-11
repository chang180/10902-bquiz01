<?php
include_once "../base.php";

//$db=new DB($_GET['table']);
$db=new DB("menu");

if(!empty($_POST['id'])){
    foreach($_POST['id'] as $key=>$id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $db->del($id);
        }else{
            $row=$db->find($id);
            $row['name']=$_POST['name'][$key];
            $row['href']=$_POST['href'][$key];
            $db->save($row);
        }
    }
}

$parent=$_POST['parent'];

if(!empty($_POST['nameadd'])){
    foreach($_POST['nameadd'] as $key => $name){
        $new=[];
        $new['name']=$name;
        $new['href']=$_POST['hrefadd'][$key];
        $new['sh']=1;
        $new['parent']=$parent;
        $db->save($new);
    }
}


to("../admin.php?do=menu");
