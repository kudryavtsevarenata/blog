<?php 
include('../../path.php');
include('../../app/controllers/commentaries.php');
?>
<!doctype html>
<html lang="ru">
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
                <h2>Редактирование комментария</h2>
                <div class="row add-post">
                <div class="mb-12 col-12 com-md-12 err">
                  <?php include "../../app/helps/errorinfo.php"; ?>
                </div>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?=$id;?>">
                    <div class="col mb-2">
                      <input name="email" disabled value="<?=$email;?>" type="text" class="form-control" placeholder="Email" aria-label="Название статьи">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Комментарий</label>
                        <textarea name="content" value="<?=$text;?>" id="editor" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-check">
                        <?php if (empty($comment['status']) or $comment['status'] == 0): ?> 
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked">
                            <label class="form-check-label" for="flexCheckChecked">Publish</label>
                        <?php else: ?>
                            <input name="publish" class="form-check-input" type="checkbox" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">Publish</label>
                        <?php endif; ?>
                    </div>
                    <div class="col col-6 mb-4">
                        <button name="edit_comment" class="btn btn-primary" type="submit">Сохранить</button>
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
    <!-- Добавление визуального редактора для текстового поля -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

    <script src="../../assets/js/script.js"></script>
  
  </body>
</html>