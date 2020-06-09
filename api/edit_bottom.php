<?php
include_once "../base.php";

$total=new DB('bottom');

$row=$total->find(1);
$row['bottom']=$_POST['bottom'];
$total->save($row);

to("../admin.php?do=bottom");
