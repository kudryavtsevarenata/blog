<?php
include("../../config.php");
$tema = "Форма обратной связи";
$message = '
<html>
<body>
<center>	
<table border=1 cellpadding=6 cellspacing=0 width=90% bordercolor="#DBDBDB">
 <tr><td colspan=2 align=center bgcolor="#E4E4E4"><b>Информация</b></td></tr>
 <tr>
  <td><b>Отправитель</b></td>
  <td>'.$_POST['email'].'</td>
 </tr>
 <tr>
  <td><b>Сообщение</b></td>
  <td>'.$_POST['mess'].'</td>
 </tr>
</table>
</center>	
</body>
</html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
mail($to, $tema, $message, $headers);
?>
