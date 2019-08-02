<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/index.style.css">
    <title>НАЙДЕННЫЕ ТОВАРЫ</title>
  </head>
  <body>
  <a href="index.php?" class="back"> вернуться </a>
  <div class="poster">задание <img src="../photo/info.png" height=18>
    <div class="descr">
    [№ 14]. Программа должна содержать меню и ввод-вывод в окно на экране.
В файле создать и сохранить список товаров. Для каждого товара указаны его название, название магазина, в котором продается товар, стоимость товара в тыс. руб. и его количество с указание единицы измерения (например, 100 шт., 20 кг.).
Написать программу, выполняющую следующие действия: создание, корректировка или дополнение списка товаров с клавиатуры; сортировка по названию товара или по названию магазина; вывод на экран информации о товаре, название которого введено с клавиатуры; запись списка в файл под тем же или иным именем.
    </div>
  </div>
  <br><br>
  <H1>НАЙДЕННЫЕ ТОВАРЫ</H1>
  <br>
  
<?php
  session_start();
  
  if (isset($_POST['FileName'])) {
     $_SESSION["FileName"] = $_POST['FileName'];
  }  
  
  if ($_SESSION["FileName"] == NULL){
     header("Location: SetFile.php");
  }
  
  $txt = "./docs/".$_SESSION["FileName"].".txt";
  
  $file = fopen($txt,"a+");
  fclose($file);
  
  echo "File: ",$txt;
  
  $txt = "./docs/".$_SESSION["FileName"].".txt";
  
  $file = file($txt);
  
  $content = file_get_contents($txt);
  
  $n = 0;
  
  echo '<table width=100%>
  <tr>
  <th> № </td>
  <th> товар </th>
  <th> магазин </th>
  <th> цена </th>
  <th> кол-во </th>
  </tr>';
  
  if ($content !== ''){
    foreach ($file as $line) {
      $word = explode(",", $line);
      
      if (stripos($word[0], $_POST["Seach"]) !== false){     
        echo '<tr><td>',($n+1),'</td>';
      
        for ($i = 0; $i < 4; $i++){
            echo '<td>',$word[$i],'</td>';
        }
        echo '<td><a href="index.php?del=0"><img src="../photo/remove.png" height=18></a></td></tr>';
      }$n++;
    }
  }
?>
    
  </body>
</html>

