<?php
include("app/controllers/topics.php");
?>
<div class="sidebar col-md-3 col-12">
    <div class="section search">
      <h3>Search</h3>
      <form action="/search.php" method="post">
        <input type="text" name="search-term" class="text-input" placeholder="Введите запрос">
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