<?php include("path.php");
include(SITE_ROOT . "/app/database/db.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term']))
{
  $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
}
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
    <!--main-->
    <div class = "container">
      <div class = "content row">
        <div class = "main-content col-12">
        <h2>Результаты поиска</h2>
          <?php foreach ($posts as $post): ?>
            <div class="post row">
              <div class="img col-12 col-md-4">
                <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img'];?>" alt="<?=$post['title']?>" class="img-thumbnail">
              </div>
              <div class="post-text col-12 col-md-8">
                <h3>
                  <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>">
                    <?php echo substr($post['title'], 0, 120);
                      if (strlen($post['title']) > 120)
                        { echo '...';} 
                    ?>
                  </a>
                </h3>
                <i class="far fa-user"><?=$post['username'];?></i>
                <i class="far fa-calendar"><?=$post['created_date'];?></i>
                <p class="preview-text">
                  <?php
                    if (strlen($post['content']) > 150)
                      echo mb_substr($post['content'], 0, 150, 'UTF-8') . '...';
                    else
                      echo $post['content'];
                  ?>
                </p>
              </div>
            </div>
          <?php endforeach;?>
        </div>

      </div>
    </div>
    
    <?php include ("app/include/footer.php"); ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>