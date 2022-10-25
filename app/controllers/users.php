<?php
include ("app/database/db.php");

if (isset($_POST['login']))
{
    $login = $_POST['login'];
    $email = $_POST['mail'];
    $pass = password_hash($_POST['pass-second'], PASSWORD_DEFAULT);
    $admin = 0;

    $post = [
        'admin' => $admin,
        'username' => $login,
        'email' => $email,
        'password' => $pass
    ];
    $id = insert('users', $post);
    $last_row = selectOne('users', ['id' => $id]);
    tt($last_row);
}
?>