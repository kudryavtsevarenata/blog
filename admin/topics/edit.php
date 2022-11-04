<?php session_start(); 
include('../../path.php');
include('../../app/controllers/topics.php');
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
                <a href="<?= BASE_URL . "admin/topics/create.php" ;?>" class="col-2 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="<?= BASE_URL . "admin/topics/index.php" ;?>" class="col-3 btn btn-warning">Управление</a>
              </div> 
              
              <h2>Обновление категории</h2>
              <div class="row add-post">
                <div class="w-100"></div>
                  <div class="col-12 mb-3 col-md-4 err">
                    <p><?=$errMsg?></p>
                  </div>
                <div class="w-100"></div>
                <form action="edit.php" method="POST">
                    <input name="id" value="<?=$id?>" type="hidden">
                    <div class="col">
                      <input name="name" value="<?=$name?>" type="text" class="form-control" placeholder="Имя категории" aria-label="Имя категории">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Описание категории</label>
                        <textarea name="description" class="form-control" id="content" rows="6"><?=$description?></textarea>
                    </div>
                    <div class="col">
                      <button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
                    </div>
                </form>
              </div> 
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