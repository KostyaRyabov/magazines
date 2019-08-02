<?php
  session_start();
 
  $_SESSION['GetParameters'] = 0;
?>

<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/form.style.css">
    <title>Определение файла</title>
  </head>
  <body>
    <form action="index.php" method="post">
    
    <div align="center" class="block">
      <h1>Введите название файла</h1>
      
      <p><input type="text" name="FileName" size="20" required></p>
      
      <p align="center">
      <input type="reset" name="Reset" value="Очистить">
      <input type="submit" name="Submit" value="Продолжить">
      </p>
    </div>
    </form>
  </body>
</html>
