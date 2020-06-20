<?php

//一樣，edit_XXXX系列檔案都可以刪了

include_once "../base.php";

$table = $_POST['table'];
$db = new DB($table);

foreach ($_POST['id'] as $key => $id) {
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        
    } else {
        $row = $db->find($id);
        switch ($table) {
            case "title":
                if (!empty($_POST['text'])) {
                    $row['text'] = $_POST['text'][$key];
                }
                $row['sh'] = ($_POST['sh'] == $id) ? 1 : 0;
                break;
            case "admin":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "menu":
                $row['name'] = $_POST['name'][$key];
                $row['href'] = $_POST['href'][$key];
                $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

                break;
            default:
                if (!empty($_POST['text'])) {
                    $row['text'] = $_POST['text'][$key];
                }
                $row['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;

                break;
        }


// var_dump($_POST);

        $db->save($row);
    }
}

to("../admin.php?do=$table");
