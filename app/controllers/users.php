<?php
include(SITE_ROOT . "/app/database/db.php");
$errMsg = [];

function userAuth($mas)
{
    $_SESSION['id'] = $mas['id'];
    $_SESSION['login'] = $mas['username'];
    $_SESSION['admin'] = $mas['admin'];
    if ($_SESSION['admin'])
    {
        header('location: ' . BASE_URL . '../../admin/posts/index.php');
    }
    else{
        header('location: ' . BASE_URL);
    }
}

// для формы регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg']))
{
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = 0;
    if ($login === '' || $email ==='' || $passF === '' || $passS === '')
    {
        array_push($errMsg, "Не все поля заполнены!");
    } 
    elseif (mb_strlen($login, 'UTF-8') <= 2)
    {
        array_push($errMsg, "Логин должен быть более двух символов");
    }
    elseif ($passF !== $passS)
    {
        array_push($errMsg, "Пароли не совпадают");
    }
    else
    {
        $exist = selectOne('users', ['email' => $email]);
        if ($exist['email'] === $email)
        {
            array_push($errMsg,"Пользователь с такой почтой уже существует");
        }
        else
        {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }
}
else
{
    $login = '';
    $email = '';
}
// для авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["button-log"]))
{
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);
    if ($email === '' || $pass === '')
    {
        array_push($errMsg,"Не все поля заполнены!");
    } 
    else
    {
        $exist = selectOne('users', ['email' => $email]);
        if($exist && password_verify($pass, $exist['password']))
        {
            userAuth($exist);
        }
        else
        {
            array_push($errMsg,"Ошибка авторизации");
        }
    }
    
}
else
{
    $email = '';
}

// для добавления юзера в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user']))
{
    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    if ($login === '' || $email ==='' || $passF === '' || $passS === '')
    {
        $errMsg = "Не все поля заполнены!";
    } 
    elseif (mb_strlen($login, 'UTF-8') <= 2)
    {
        $errMsg = "Логин должен быть более двух символов";
    }
    elseif ($passF !== $passS)
    {
        $errMsg = "Пароли не совпадают";
    }
    else
    {
        $exist = selectOne('users', ['email' => $email]);
        if ($exist['email'] === $email)
        {
            $errMsg = "Пользователь с такой почтой уже существует";
        }
        else
        {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if (isset($_POST['admin']))
            {
                $admin = 1;
            }
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
            $user = selectOne('users', ['id' => $id]);
            userAuth($user);
        }
    }
}
else
{
    $login = '';
    $email = '';
}

?>