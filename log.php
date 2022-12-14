<?php include ("path.php"); 
include("app/controllers/users.php");
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel= "stylesheet" href = "assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption&display=swap" rel="stylesheet">

    <title>Blog</title>
  </head>
  <body>

  <?php
  include("app/include/header.php");
  ?>

<!--form--> <!--сделать вывод списком-->
<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action='log.php'>
        <h2>Авторизация</h2>
        <div class="w-100"></div>
        <div class="col-12 mb-3 col-md-4 err"> 
          <p><?php if ($errMsg) 
          { 
            foreach ($errMsg as $mes)
            {
              echo $mes;
            }
          }
          ?>
          </p>
        </div>
        <div class="w-100"></div>
        <div class="col-12 mb-3 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Почта</label>
            <input type="email" value="<?=$email?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите email..." name="mail">
          </div>
          <div class="w-100"></div>
        <div class="col-12 mb-3 col-md-4">
          <label for="exampleInputPassword1" class="form-label">Пароль</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль...">
        </div>
          <div class="w-100"></div>
          <div class="col-12 mb-3 col-md-4">
            <button type="submit" name="button-log" class="btn btn-secondary">Войти</button>
            <a href="reg.php">Зарегистрироваться</a>
          </div>
      </form>
</div>
<!--end form-->


  <?php include ("app/include/footer.php"); ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>