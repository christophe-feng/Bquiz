<?php
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    protected $pdo;
    protected $table;
    public $type=[
        1=>"健康新知",
        2=>"菸害防治",
        3=>"癌症防治",
        4=>"慢性病防治"
    ];

    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    // 簡化建議：使用 array_map 處理 where 條件，並利用 join 組合 SQL
    // 簡化範例：$where = array_map(fn($k, $v) => "`$k`='$v'", array_keys($arg[0]), $arg[0]);
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

    // 簡化建議：將陣列與單一 ID 邏輯合併處理
    // 簡化範例：$where = is_array($id) ? join(" AND ", $this->array2sql($id)) : "`id`='$id'";
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

    // 簡化建議：與 all 邏輯相似，可提取共通的 SQL 組合邏輯
    // 簡化範例：可將 WHERE 組合過程封裝成 private function sql_where($arg)
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

    // 簡化建議：將刪除邏輯統一為 where 條件處理
    // 簡化範例：$sql = "DELETE FROM $this->table WHERE " . (is_array($id) ? join(" AND ", $this->array2sql($id)) : "`id`='$id'");
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

    // 簡化建議：聚合函數（SUM, AVG 等）可以共用一個私有方法
    // 簡化範例：function math($type, $col, ...$arg) { return $this->pdo->query("SELECT $type($col)...") }
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

    // 簡化建議：使用 array_keys() 與 array_values() 快速組合 INSERT 語法
    // 簡化範例：$sql = "INSERT INTO $this->table (`" . join("`,`", array_keys($array)) . "`) VALUES ('" . join("','", $array) . "')";
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

    // 簡化建議：使用 sprintf 或直接組合字串，可更直覺
    // 簡化範例：foreach($array as $k => $v) $tmp[] = sprintf("`%s`='%s'", $k, $v);
    private function array2sql($array)
    {
        $tmp = [];
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
}

// 簡化建議：利用全域 PDO 物件，避免重複連線
// 簡化範例：建立一個 $db 全域變數或靜態屬性儲存 PDO 連線
function q($sql)
{
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    $pdo = new PDO($dsn, 'root', '');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

// 簡化建議： header("location: $url"); exit; 加上 exit 確保程式停止
// 簡化範例： function to($url) { header("location:$url"); exit; }
function to($url)
{
    header("location:" . $url);
}

// 簡化建議： var_dump($array); 也是除錯好幫手
// 簡化範例： echo '<pre>'; var_dump($array); echo '</pre>';
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

// 簡化建議：使用 if(empty($today)) 來判斷，並將重複的 date("Y-m-d") 存成變數
// 簡化範例：$date = date("Y-m-d"); $today = $Total->find(['date' => $date]) ?? ['date' => $date, 'total' => 0];
if (!isset($_SESSION['total'])) {
    $today = $Total->find(['date' => date("Y-m-d")]);
    if (empty($today)) {
        $Total->save(['date' => date("Y-m-d"), 'total' => 1]);
    } else {
        $today['total'] = $today['total'] + 1;
        $Total->save($today);
    }
    $_SESSION['total'] = 1;
}
