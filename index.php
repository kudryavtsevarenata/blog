<?php include("path.php");
include("app/controllers/topics.php");
// $posts = selectAll('posts', ['status' => 1]);
$posts = selectAllFromPostsWithUserOnIndex('posts', 'users');
$topTopic = selectTopTopicsFromPosts('posts');
?>
<!doctype html>
<html lang="en">
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

    <!-- блок карусели -->
    <div class = "container">
        <div class = "row">
            <h2 class = "slider-title">Топ публикации</h2>
        </div>
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Индикаторы -->
              <div class="carousel-inner">
              <?php foreach($topTopic as $key => $post): ?>
                <?php if ($key == 0): ?>
                  <div class="carousel-item active">
                <?php else: ?>
                  <div class="carousel-item">
                <?php endif;?>
                  <img class="img-fluid" src="<?=BASE_URL . 'assets/images/posts/' . $post['img'];?>" alt="<?=$post['title']?>">
                  <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href = "<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=mb_substr($post['title'], 0, 50, 'UTF-8');?></a></h5>
                  </div>
                </div>
              <?php endforeach;?>

            </div>
            <!-- Элементы управления -->
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Предыдущий</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Следующий</span>
            </a>
        </div>
    </div>

    <!--main-->
    <div class = "container">
      <div class = "content row">
        <div class = "main-content col-md-9 col-12">
        <h2>Последние публикации</h2>
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

        <div class="sidebar col-md-3 col-12">
          <div class="section search">
            <h3>Search</h3>
            <form action="index.html" method="post">
              <input type="text" name="search-area" class="text-input" placeholder="Введите запрос">
            </form>
          </div>
          <div class="section topics">
            <h3>Topics</h3>
            <ul>
              <?php foreach ($topics as $key => $topic):?>
              <li><a href="#"><?=$topic['name'];?></a> </li>
              <?php endforeach ?>
            </ul>
          </div>

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