<?php

include_once (SITE_ROOT . "/app/database/db.php");
// контроллер
$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comments = [];
$commentsForAdm = selectAll('comments');

// создание комментария
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment']))
{
    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);
    if ($email === '' || $comment ==='')
    {
        array_push($errMsg, "Не все поля заполнены!");
    } 
    elseif (mb_strlen($comment, 'UTF-8') <= 5)
    {
        array_push($errMsg, "Содержание комментария должно быть более пяти символов");
    }
    else
    {
        $user = selectOne('users', ['email' => $email]);
        if ($user['email'] == $email)
        {
            $status = 1;
        }
        $comment = [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment
        ];
        $comment = insert('comments', $comment);
        $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
    }
}
else
{
    $email = '';
    $comment ='';
    $comments = selectAll('comments', ['page' => $page, 'status' => 1]);
}

// Удаление
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id']))
{
    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('location: '. BASE_URL . 'admin/comments/index.php');
}

// publish / unpublish
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id']))
{
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];
    $post_d = update('comments', $id, ['status' => $publish]);
    header('location: '. BASE_URL . 'admin/comments/index.php');
    exit();
}
// Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $comment = selectOne('comments', ['id' => $_GET['id']]);
    $id = $comment['id'];
    $email = $comment['email'];
    $text = $comment['comment'];
    $publish = $comment['status'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment']))
{
    $id = $_POST['id'];
    $text = trim($_POST['content']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    if ($text === '')
    {
        array_push($errMsg, "Комментарий пуст!");
    } 
    elseif (mb_strlen($text, 'UTF-8') <= 5)
    {
        array_push($errMsg, "Комментарий должен содержать больше пяти символов");
    }
    else
    {
        $com = [
            'comment' => $text,
            'status' => $publish
        ];
        $comment = update('comments', $id, $com);
        header('location: '. BASE_URL . 'admin/comments/index.php');
        
    }
}
else
{
    $text = $_POST['content'];
    $publish = isset($_POST['publish']) ? 1 : 0;
}


?>