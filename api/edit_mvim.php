<?php
include_once "../base.php";

$mvim=new DB('mvim');

foreach($_POST['id'] as $key => $id){
    // 先做刪除，刪掉的就不用再修改了
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        $mvim->del($id);

    }else {
        $row=$mvim->find($id);
        $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $mvim->save($row);
    }
}
to("../admin.php?do=mvim");

?>