<?php
include ("app/database/db.php");
$errMsg = '';
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = 0;
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
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $errMsg = "Пользователь " . "<strong>" .  $login ."</strong>" ." успешно зарегистрирован";
        }
    }
    
    // $last_row = selectOne('users', ['id' => $id]);
}
else
{
    echo 'GET';
    $login = '';
    $email = '';
}

    // $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);

?>