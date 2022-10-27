<?php include("path.php"); 
include ("app/database/db.php");
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
              <div class="carousel-item active">
                <img class="img-fluid" src="assets/images/image1.jpg" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5><a href = "#">First slide label</a></h5>
                </div>
              </div>
              
              <div class="carousel-item">
                <img class="img-fluid" src="assets/images/image2.jpg" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href = "#">Second slide label</a></h5>
                </div>
              </div>
              <div class="carousel-item">
                  <img class="img-fluid" src="assets/images/image3.jpg" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5><a href = "#">Third slide label</a></h5>
                </div>
              </div>
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
          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/image3.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post-text col-12 col-md-8">
              <h3>
                <a href="#"> Прикольная статья на тему динамического программирования</a>
              </h3>
              <i class="far fa-user">Имя автора</i>
              <i class="far fa-calendar">Mar 11, 2022</i>
              <p class="preview-text">
                Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum 
              </p>
            </div>
          </div>

          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="assets/images/image3.jpg" alt="" class="img-thumbnail">
            </div>
            <div class="post-text col-12 col-md-8">
              <h3>
                <a href="#"> Прикольная статья на тему динамического программирования</a>
              </h3>
              <i class="far fa-user">Имя автора</i>
              <i class="far fa-calendar">Mar 11, 2022</i>
              <p class="preview-text">
                Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum 
              </p>
            </div>
          </div>
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
              <li><a href="#">Poems</a> </li>
              <li><a href="#">Quotes</a> </li>
              <li><a href="#">Fiction</a> </li>
              <li><a href="#">Biography</a> </li>
              <li><a href="#">Motivation</a> </li>
              <li><a href="#">Inspiration</a> </li>
              <li><a href="#">Life Lessons</a> </li>
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