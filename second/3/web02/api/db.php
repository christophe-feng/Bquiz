<?php
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    protected $pdo;
    protected $table;

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function all(...$arg)
    {
        $sql = " SELECT * FROM $this->table";
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
        $sql = " SELECT * FROM $this->table ";
        if (is_array($id)) {
            $where = $this->array2sql($id);
            $sql .= " WHERE " . join(" AND ", $where);
        } else {
            $sql .= " WHERE `id` = '{$id}'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function count(...$arg)
    {
        $sql = " SELECT count(*) FROM $this->table ";

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

    function del($id)
    {
        $sql = " DELETE FROM $this->table ";
        if (is_array($id)) {
            $where = $this->array2sql($id);
            $sql .= " WHERE " . join(" AND ", $where);
        } else {
            $sql .= " WHERE `id`='{$id}'";
        }
        return $this->pdo->exec($sql);
    }

    function sum($col, ...$arg)
    {
        $sql = " SELECT sum(`$col`) FROM $this->table";
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

    //很不熟
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = " UPDATE $this->table";
            $set = $this->array2sql($array);
            $sql .= " SET " . join(", ", $set);
            $sql .= " WHERE `id`='{$array['id']}'";
        } else {
            $sql = " INSERT INTO `{$this->table}`";
            $keys = array_keys($array);
            $sql .= "(`" . join("`,`", $keys) . "`)";
            $sql .= " VALUES ('" . join("','", $array) . "')";
        }
        return $this->pdo->exec($sql);
    }

    //還不熟悉
    private function array2sql($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
}

//還不熟悉
function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function to($url)
{
    header("location:" . $url);
}

//還不熟悉
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Total = new DB('total');
$Mem = new DB('members');
$Post = new DB('post');
$Que = new DB('que');
$Log = new DB('log');

//很不熟，需要搞清楚邏輯
if (!isset($_SESSION['total'])) {
    $totay = $Total->find(['date' => date("Y-m-d")]);
    if (empty($today)) {
        $Total->save(['date' => date("Y-m-d"), 'total' => 1]);
    } else {
        $today['total'] = $today['total'] + 1;
        $Total->save($today);
    }
    $_SESSION['total'] = 1;
}
