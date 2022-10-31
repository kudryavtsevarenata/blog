<?php session_start(); 
include('../../path.php');
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
                <a href="create.html" class="col-2 btn btn-success">Добавить</a>
                <span class="col-1"></span>
                <a href="index.html" class="col-3 btn btn-warning">Управление</a>
              </div> 
              
              <h2>Добавление пользователя</h2>
                <form action="create.php" method="POST">
                <div class="w-100"></div>
               <div class="col-12 mb-3 col-md-4">
                   <label for="formGroupExampleInput" class="form-label">Логин</label>
                   <input type="text" value="<?=$login?>" class="form-control" id="formGroupExampleInput" placeholder="Введите логин..." name="login">
                 </div>
                 <div class="w-100"></div>
               <div class="col-12 mb-3 col-md-4">
                 <label for="exampleInputEmail1" class="form-label">Email</label>
                 <input type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email..." name="mail">
               </div>
               <div class="w-100"></div>
               <div class="col-12 mb-3 col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Пароль</label>
                 <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль..." name="pass-first">
               </div>
               <div class="w-100"></div>
               <div class="col-12 mb-3 col-md-4">
                   <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                   <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Повторите пароль..." name="pass-second">
                 </div>
                 <div class="w-100"></div>
                 <select class="form-select" aria-label="Default select example">
                      <option selected>User</option>
                      <option value="1">Admin</option>
                </select>
                <div class="w-100 mb-3"></div>
                    <div class="col">
                      <button class="btn btn-primary" type="submit">Создать</button>
                    </div>
                </form>
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