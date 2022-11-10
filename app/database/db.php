<?php
session_start();
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
    return $pdo->lastInsertId();
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

// записи одного пользователя
function selectAllFromPostsWithUser($table1, $table2)
{
    global $pdo;
    $sql = "SELECT t1.id, t1.title, t1.img, t1.content, t1.status, t1.id_topic, t1.created_date,
    t2.username 
    FROM dinamic_site.$table1 AS t1 
    JOIN dinamic_site.$table2 AS t2
     ON t1.id_user = t2.id;";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
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
// селект для имени автора на главной
function selectAllFromPostsWithUserOnIndex($table1, $table2)
{
    global $pdo;
    $sql = "SELECT p.*, u.username
    FROM dinamic_site.$table1 AS p 
    JOIN dinamic_site.$table2 AS u
     ON p.id_user = u.id
     WHERE p.status = 1;";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// селект топ
function selectTopTopicsFromPosts($table1)
{
    global $pdo;
    $sql = "SELECT * FROM dinamic_site.$table1 
    WHERE id_topic = 5;";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// селект для поиска
function searchInTitleAndContent($text, $table1, $table2)
{
    global $pdo;
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    $sql = "SELECT p.*, u.username
    FROM dinamic_site.$table1 AS p 
    JOIN dinamic_site.$table2 AS u
    ON p.id_user = u.id
    WHERE p.status = 1
    AND p.title LIKE '%$text%' OR p.content LIKE '%$text%';";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// селект для одной записи на single
function selectPostFromPostsWithUserOnSingle($table1, $table2, $id)
{
    global $pdo;
    $sql = "SELECT p.*, u.username
    FROM dinamic_site.$table1 AS p 
    JOIN dinamic_site.$table2 AS u
     ON p.id_user = u.id
     WHERE p.id = $id;";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

?>