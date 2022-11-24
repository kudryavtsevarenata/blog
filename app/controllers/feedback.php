<?php
/*
$to = "kudryavtseva.renata@yandex.ru";
$from = "From: отзыв с сайта";
$email = $_POST['email'];
$mess = $_POST['message'];
// i hate your website, is ruined my life...
$theme = 'Blog';
$page = 'Главная страница'; 
$message = '
<html>
<body>
<center>	
<table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td></tr>
 <tr>
  <td><b>Откуда</b></td>
  <td>'.$page.'</td>
 </tr>
 <tr>
  <td><b>Адресат</b></td>
  <td><a href="mailto:'.$email.'">'.$email.'</a></td>
 </tr>
 <tr>
  <td><b>Сообщение</b></td>
  <td>'.$mess.'</td>
 </tr>
</table>
</center>	
</body>
</html>'; 
$headers  = "Content-type: text/html; charset=utf-8\r\n";
$headers .= $from;
mail($to, $theme, $message, $headers);
*/

$to = "kudryavtseva.renata@yandex.ru";
$tema = "Форма обратной связи";
$message = "Ваш email: ".$_POST['email']."<br>";
$message .= "Сообщение: ".$_POST['mess']."<br>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $tema, $message, $headers); 

?>
