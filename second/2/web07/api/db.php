<?php
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;dbname=db02;charset=utf8";
    protected $pdo;
    protected $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = "SELECT * FROM $this ->table";
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
        $sql = "SELECT * FROM $this->table";
        if (is_array($id)) {
            $where = $this->array2sql($id);
            $sql .= " WHERE " . join(" AND ", $where);
        } else {
            $sql .= "WHERE `id`='{$id}'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function save($array)
    {
        if(isset($array['id'])){
            $set=$this->array2sql($array);
            $sql="UPDATE $this->table SET ".join(",",$set). " WHERE `ID`='{$array['id']}'";
        }else{
            $cols=array_keys($array);
            $sql= "INSERT INTO $this->table (`".join("`,`",$cols)."`) VALUES('".join("','",$array)."')";
        }
        return $this->pdo->exec($sql);
    }

    function del($array)
    {
        $sql = '';

        return $this->pdo->exec($sql);
    }

    function count(...$arg)
    {
        $sql = '';

        return $this->pdo->query($sql)->fetchColumn();
    }

    function sum($arg)
    {
        $sql = '';
        return $this->pdo->query($sql)->fetchColumn();
    }

    function array2sql($array)
    {

        return $array;
    }
}

function to($url)
{
    header("location" . $url);
}

function q($sql)
{
    $dsn = "mysql:host=localhost;dbname:db02;charset:utf8";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
