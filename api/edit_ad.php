<?php
include_once "../base.php";

$ad=new DB('ad');

foreach($_POST['id'] as $key => $id){
    // 先做刪除，刪掉的就不用再修改了
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){

        $ad->del($id);

    }else {
        $row=$ad->find($id);
        $row['text']=$_POST['text'][$key];
        $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $ad->save($row);
    }
}
to("../admin.php?do=ad");

?>