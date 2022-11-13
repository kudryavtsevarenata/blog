<?php 
include('../../path.php');
include('../../app/controllers/commentaries.php');
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
              <h2>Управление комментариями</h2>
              <div class="row title-table">
                <div class="id col-1">ID</div>
                <div class="title col-5">Текст</div>
                <div class="author col-3">Автор</div>
                <div class="red col-3">Управление</div>
              </div> 
              <div class="row post">
                <?php foreach ($commentsForAdm as $key => $comment): ?>
                  <div class="id col-1"><?=$comment['id'];?></div>
                  <div class="title col-5"><?=mb_substr($comment['comment'], 0, 50, 'UTF-8') . '...';?></div>
                  <?php 
                    $user = $comment['email'];
                    $user = explode('@', $user);
                    $user = $user[0];
                  ?>
                  <div class="author col-3"><?=$user;?></div>
                  <div class="red col-1"> <a href="edit.php?id=<?=$comment['id'];?>">edit</a></div>
                  <div class="del col-1"> <a href="edit.php?delete_id=<?=$comment['id'];?>">delete</a> </div>
                  <?php if ($comment['status']): ?>
                    <div class="status col-1"> <a href="edit.php?publish=0&pub_id=<?=$comment['id'];?>">unpublish</a> </div>
                  <?php else: ?>
                    <div class="status col-1"> <a href="edit.php?publish=1&pub_id=<?=$comment['id'];?>">publish</a> </div>
                  <?php endif;?>
                <?php endforeach ?>
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