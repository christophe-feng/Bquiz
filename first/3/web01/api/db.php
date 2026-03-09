<?php
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
    protected $pdo;
    protected $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = " SELECT * FROM `$this->table` ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $where = $this->array2sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $where);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    function find($id)
    {
        $sql = " SELECT * FROM `$this->table` ";
        if (is_array($id)) {
            $where = $this->array2sql($id);
            $sql .= " WHERE " . join(" AND ", $where);
        } else {
            $sql .= " WHERE `id`='$id' ";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = " SELECT count(*) FROM `$this->table`";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $where = $this->array2sql($arg[0]);
                $sql .= " WHERE " . join(" AND ", $where);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function del($id){
        $sql=" DELETE FROM `$this->table` ";
        if(is_array($id)){
            $where=$this->array2sql($id);
            $sql .=" WHERE " . join(" AND ",$where);
        }else{
            $sql .=" WHERE `id`='$id' ";
        }
        return $this->pdo->exec($sql);
    }

    // function save($array){
    //     if(isset($array['id'])){
    //         $this->update($array);
    //     }else{
    //         $this->insert($array);
    //     }
    // }

    function save($array){
        if(isset($array['id'])){
            $sql=" UPDATE $this->table";
            $set= $this->array2sql($array);
            $sql .=" SET " . join(", ",$set);
            $sql .=" WHERE id='{$array['id']}'";
            }else{
            $sql=" INSERT INTO `{$this->table}` ";
            $keys=array_keys($array);
            $sql .="(`" . join("`,`", $keys) . "`)";
            $sql .=" VALUES ('" . join("','", $array) . "')";
        }
        return $this->pdo->exec($sql);
    }

    private function array2sql($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }
}

function q($sql){
    $dsn="mysql:host=localhost;charset=utf8;dbname=db11";
    $pdo=New PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url){
    header("location:".$url);
}

// if(!isset($_SESSION['view'])){
//     $_SESSION['view']=1;
//     $total=$Total->find(1);
//     $total['total']++;
//     $Total->save($total);
// }

$Title=new DB('title');
$Ad=new DB('ad');
$Mvim=new DB('mvim');
$Image=new DB('image');
$Total=new DB('total');
$Bottom=new DB('bottom');
$News=new DB('news');
$Admin=new DB('admin');
$Menu=new DB('menu');