<?php
session_start();
date_default_timezone_set("Asia/Taipei");

$levelStr=[
    1=>"普遍級",
    2=>"輔導級",
    3=>"保護級",
    4=>"限制級"
];

$duration=[
    1=>"14:00 ~ 16:00",
    2=>"16:00 ~ 18:00",
    3=>"18:00 ~ 20:00",
    4=>"20:00 ~ 22:00",
    5=>"22:00 ~ 24:00",
];

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db03";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new DB($this->dsn,'root','');
    }

    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $where=$this->array2sql($arg[0]);
                $sql .= " WHERE ".join(" AND ",$where);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id){
        $sql="SELECT * FROM $this->table ";
        if(is_array($id)){
            $where=$this->array2sql($id);
            $sql .= " WHERE ".join(" AND ",$where);
        }else{
            $sql .= " WHERE `id`='{$id}'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array){
        if(isset($array['id'])){
            $set=$this->array2sql($array);
            $sql="UPDATE $this->table SET ".join(",",$set). " WHERE `id`='{$array['id']}'";
        }else{
            $cols=array_keys($array);
            $sql="INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }

    function del($id){
        $sql="DELETE FROM $this->table";
        if(is_array($id)){
            $where=$this->array2sql($id);
            $sql .= " WHERE ".join(" AND ",$where);
        }else{
            $sql .= " WHERE `id`='{$id}'";
        }
        return $this->pdo->exec($sql);
    }
}