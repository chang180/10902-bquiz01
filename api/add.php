<?php
// 思考方向可從表單建立的名稱都一樣開始
// 管理者帳號或選單的選項需要另做判斷，所以改使用switch case處理
// 至此可將insert_XXX檔案全刪了
include_once "../base.php";

$table=$_POST['table'];
$db=new DB($table);
$data=[];

if(!empty($_FILES['img']['tmp_name'])){
    $filename=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$filename);
    $data['img']=$filename;
}

switch($table){
    case "title":
        $data['text']=$_POST['text'];
        $sh=0;
    break;
    case "admin":
        $data["acc"]=$_POST["acc"];
        $data["pw"]=$_POST["pw"];
    break;
    case "menu":
        $data["name"]=$_POST["name"];
        $data["href"]=$_POST["href"];
        $data['sh']=1;

    break;
    default:
    $data['text']=$_POST['text'];
    $sh=1;
    
break;
}




// if($table=='title'){
//     $data['sh']=0;
// }
// else{
//     $data['sh']=1;
// }
// $data['sh']=0;

$db->save($data);
to("../admin.php?do=$table");


?>