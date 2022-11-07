<?php
include(SITE_ROOT . "/app/database/db.php");
if (!$_SESSION)
{
    header('location: '. BASE_URL . 'log.php');
}
$errMsg = [];
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';
$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUser('posts', 'users');

// создание записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post']))
{
    if(!empty($_FILES['img']['name']))
    {
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\images\posts\\" . $imgName;

        if (strpos($fileType, 'image') === false)
        {
            array_push($errMsg, "Можно загружать только изображения");
        }

        $result = move_uploaded_file($fileTmpName, $destination);
        if ($result)
        {
            $_POST['img'] = $imgName;
        }
        else
        {
            array_push($errMsg, "Произошла ошибка загрузки изображения");
        }
    }
    else
    {
        array_push($errMsg, "Произошла ошибка получения изображения");
    }
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;
    if ($title === '' || $content ==='' || $topic ==='')
    {
        array_push($errMsg, "Не все поля заполнены!");
    } 
    elseif (mb_strlen($title, 'UTF-8') <= 5)
    {
        array_push($errMsg, "Название статьи должно быть более пяти символов");
    }
    else
    {
        $post = [
            'title' => $title,
            'content' => $content,
            'id_user' => $_SESSION['id'],
            'img' => $_POST['img'],
            'status' => 1,
            'id_topic' => $topic
        ];
        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: '. BASE_URL . 'admin/posts/index.php');
        
    }
}
else
{
    $title = '';
    $content = '';
}


// Редактирование
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']))
{
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit']))
{
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    if ($name === '' || $description ==='')
    {
        $errMsg = "Не все поля заполнены!";
    } 
    elseif (mb_strlen($name, 'UTF-8') <= 2)
    {
        $errMsg = "Название категории должно содержать более двух символов";
    }
    else
    {
        $topic = [
            'name' => $name,
            'description' => $description
        ];
        $id = $_POST['id'];
        $topic_id = update('topics', $id, $topic);
        header('location: '. BASE_URL . 'admin/topics/index.php');
    }
}

// Удаление
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id']))
{
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location: '. BASE_URL . 'admin/topics/index.php');
}

?>