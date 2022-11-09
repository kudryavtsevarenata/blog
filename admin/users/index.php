<?php session_start(); 
include('../../path.php');
include('../../app/controllers/users.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel= "stylesheet" href = "../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">

    <title>Blog</title>
  </head>
  <body>
  
  <?php
  include("../../app/include/header-admin.php");
  ?>

    <div class="container">
        <div class="row"> 
            <?php include("../../app/include/sidebar-admin.php"); ?>

            <div class="posts col-9">
            <div class="button row">
                <a href="<?= BASE_URL . "admin/users/create.php" ;?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?= BASE_URL . "admin/users/index.php" ;?>" class="col-3 btn btn-warning">Управление</a>
              </div> 
              <h2>Пользователи</h2>
              <div class="row title-table">
                <div class="id col-1"> ID </div>
                <div class="title col-2">Логин</div>
                <div class="title col-3">Почта</div>
                <div class="author col-2">Роль</div>
                <div class="red col-4">Управление</div>
              </div> 
              <?php foreach ($users as $key => $user):?>
                <div class="row post">
                  <div class="id col-1"><?=$user['id'];?></div>
                  <div class="title col-2"><?=$user['username'];?></div>
                  <div class="title col-3"><?=$user['email'];?></div>
                  <?php if ($user['admin'] == 1):?>
                    <div class="author col-2">admin</div>
                  <?php else:?>
                    <div class="author col-2">user</div>
                  <?php endif;?>
                  <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id']?>">edit</a></div>
                  <div class="del col-2"><a href="index.php?delete_id=<?=$user['id']?>">delete</a></div>
                </div> 
              <?php endforeach;?>
            </div>
        </div>
    </div>
    
  <?php include ("../../app/include/footer.php"); ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>