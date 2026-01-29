<?php
session_start();

class DB{
    protected $dsn="mysql:host=localhost;dbname=db02;charset=utf8";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    function all(...$arg){

    }

    function find($id){

    }

    function save($array){

    }

    function del($array){

    }

    function count(...$arg){

    }

    function sum($arg){
        
    }

    function array2sql($array){

    }
}

function to($url){
    header("location".$url);
}

function q($sql){
    $dsn="mysql:host=localhost;dbname:db02;charset:utf8";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}