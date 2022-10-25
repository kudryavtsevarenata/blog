<?php
require("connect.php");

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
// проверка запроса
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE)
    {
        echo $errInfo[2];
        exit();
    }
    return true;
}

function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM dinamic_site.$table";
    if (!empty($params))
    {
        $i = 0;
        foreach ($params as $key => $value)
        {
            if (!is_numeric($value))
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0)
            {
                $sql = $sql . " WHERE $key = $value ";
            }
            else{
                $sql = $sql . "AND $key = $value ";
            }
            $i++;
        }
    }
    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $date = $query->fetchAll();
    return $date;
}

function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM dinamic_site.$table";
    if (!empty($params))
    {
        $i = 0;
        foreach ($params as $key => $value)
        {
            if (!is_numeric($value))
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0)
            {
                $sql = $sql . " WHERE $key = $value ";
            }
            else{
                $sql = $sql . "AND $key = $value ";
            }
            $i++;
        }
    }
    // $sql = $sql . "LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    $date = $query->fetch();
    return $date;
}

function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $col = "";
    $mask = "";
    foreach ($params as $key => $value)
    {
        if ($i === 0)
        {
            $col = $col . $key;
            $mask = $mask . "'" . $value . "'";
        }
        else{
            $col = $col . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO dinamic_site.$table ($col) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = "";
    foreach ($params as $key => $value)
    {
        if ($i === 0)
        {
            $str = $str . $key . " = '" . $value . "'";
        }
        else{
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE dinamic_site.$table SET $str WHERE id = $id;";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

function delete($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM dinamic_site.$table WHERE id = $id;";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

$arrData =[
    'admin' => '0',
    'username' => '228',
    'email' => 're228@re.ru',
    'password' => '121212'
];

$params = [
    'admin' => 0,
    'username' => 'Powered'
];
// tt(selectOne('users', $params));
// tt(selectAll('users', $params));
// insert('users', $arrData);
// update('users', 5, $params)
delete('users', 5);
?>