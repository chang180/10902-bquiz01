<?php
include_once "../base.php";

$image=new DB('image');

foreach($_POST['id'] as $key => $id){
    // 先做刪除，刪掉的就不用再修改了
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        $image->del($id);

    }else {
        $row=$image->find($id);
        $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $image->save($row);
    }
}
to("../admin.php?do=image");

?>