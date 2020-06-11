<?php
date_default_timezone_set("Asia/Taipei");
session_start();

class DB{
    //設定屬性
    private $pdo;
    private $table="";
    private $dsn="mysql:host=localhost;charset=utf8;dbname=db88";
    private $root="root";
    private $password="";
    
    //設定建構式
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,$this->root,$this->password);
    }

    //取得全部資料
    public function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(isset($arg[0]) && is_array($arg[0])){
            foreach($arg[0] as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql.=" WHERE ".implode(" && ",$tmp);
        }
        if(isset($arg[1])) $sql.=$arg[1];
        return $this->pdo->query($sql)->fetchAll();
    }

    //取得單筆資料
    public function find($arg){
        $sql="SELECT * FROM $this->table ";
        if(is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql.=" WHERE ".implode(" && ",$tmp);
        }else $sql.=" WHERE `id`='$arg'";
        
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    //計算筆數
    public function count(...$arg){
        $sql="SELECT COUNT(*) FROM $this->table";
        if(isset($arg[0]) && is_array($arg[0])){
            foreach($arg[0] as $key =>$value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);
            }
            $sql.=" WHERE ".implode(" && ",$tmp);
        }else $sql.=$arg[0];
        if(isset($arg[1])) $sql.= $arg[1];

        return $this->pdo->query($sql)->fetchColumn();
    }

    //新增或更新資料
    public function save($arg){
        if(isset($arg['id'])){
            //更新
            foreach($arg as $key=>$value){
                //可以不執行id的判斷
                // if($key!='id'){
                    $tmp[]=sprintf("`%s`='%s'",$key,$value);
                // }
                $sql="UPDATE $this->table SET ".implode(",",$tmp)." WHERE `id`='".$arg['id']."'";
            }
            //新增
        }else $sql="INSERT INTO $this->table (`".implode("`,`",array_keys($arg))."`) VALUES ('".implode("','",$arg)."')";
        // echo $sql;
        return $this->pdo->exec($sql);
    }

    //刪除資料
    public function del($arg){
        $sql="DELETE FROM $this->table ";
        if(isset($arg) && is_array($arg)){
            foreach($arg as $key => $value){
                $tmp[]=sprintf("`%s`='%s'",$key,$value);

            }
            $sql.= " WHERE ".implode(" && ",$tmp);
        }else $sql.= "WHERE id='$arg'";
        return $this->pdo->exec($sql);
    }

    //萬用查詢
    public function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }


}


// direct
function to($url){
    header("location:".$url);
}