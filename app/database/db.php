<?php
require("connect.php");

function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function selectAll($table)
{
    global $pdo;
    $sql = "SELECT * FROM dinamic_site.$table";
    $query = $pdo->prepare($sql);
    $query->execute();
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE)
    {
        echo $errInfo[2];
        exit();
    }
    $date = $query->fetchAll();
    return $date;
}

tt(selectAll('users'));
?>