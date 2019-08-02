<?php
  session_start();
  
  $_SESSION['GetParameters'] = 1;
  
?>

<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/form.style.css">
    <title>Анкета абитуриента </title>
  </head>
  <body>
    <form action="index.php" method="post">
    
    <div align="center" class="block">
      <h1> НОВЫЙ ТОВАР </h1>
      
      <p>Товар: <input type="text" name="Tovar" size="20" required></p>
      <p>Магазин: <input type="text" name="Magazin" size="20" required></p>
      <p>Цена (в тыс. руб.): <input type="text" name="Cena" size="20" required></p>
      <p>Кол-во: <input type="text" name="Kolvo" size="20"  required></p>
       
      <p align="center">
      <input type="reset" name="Reset" value="Очистить">
      <input type="submit" name="Submit" value="Продолжить">
      </p>
    </div>
    </form>
    
    <a href="index.php"><div class="button">К списку</div></a>
  </body>
</html>
