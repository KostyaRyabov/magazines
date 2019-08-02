<html>
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/index.style.css">
    <title>СПИСОК ТОВАРОВ</title>
  </head>
  <body>
  <a href="sorttovar.php?" class="s1"> сортировать по товару</a>
  <a href="sortmagaz.php?" class="s2"> сортировать по магазину</a>
  <a href="SetFile.php?" class="changefile"> поменять файл</a>
  <div class="poster">задание <img src="../photo/info.png" height=18>
    <div class="descr">
    [№ 14]. Программа должна содержать меню и ввод-вывод в окно на экране.
В файле создать и сохранить список товаров. Для каждого товара указаны его название, название магазина, в котором продается товар, стоимость товара в тыс. руб. и его количество с указание единицы измерения (например, 100 шт., 20 кг.).
Написать программу, выполняющую следующие действия: создание, корректировка или дополнение списка товаров с клавиатуры; сортировка по названию товара или по названию магазина; вывод на экран информации о товаре, название которого введено с клавиатуры; запись списка в файл под тем же или иным именем.
    </div>
  </div>
  <br><br>
  <H1>СПИСОК ТОВАРОВ</H1>
  <br><form action="index1.php" method="post" align="center">
  <p>Найти товар: <br><input type="text" name="Seach" size="20"></p>
  <input type="submit" name="Submit" value="Поиск">
  </form>
  
<?php
  session_start();
  
  if (isset($_POST['newname'])) {
  
  
     $fpp = fopen("./docs/".$_POST['newname'].".txt", "w+");
     $buf = file("./docs/buffer.txt");
     
     for ($ii = 0; $ii < sizeof($buf); $ii++){
        fputs($fpp, $buf[$ii]);
     }
     fclose($fpp);
  } 
  
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

  if(isset($_GET["del"])){
    $p = $_GET["del"];
    $file = file($txt);
    $i = 0;
    while($i<sizeof($file)){
      if ($p == $i) {
          $file[$i] = "";
      }
      
      $i++;
    }
     
    $fp=fopen($txt,"w+"); 
    fputs($fp,implode("",$file));
    if (sizeof($file) == $i){
      fputs($fp,"\r\n---");
      $file = file($txt);  
      unset($file[sizeof($file)-1]);
      file_put_contents($txt, trim(implode($file)));
      unset($txt, $file);
    }      
    fclose($fp);
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION['GetParameters'] == 1) {
    $input[0] = $_POST['Tovar'];
    $input[1] = $_POST['Magazin'];
    $input[2] = $_POST['Cena'];
    $input[3] = $_POST['Kolvo'];
    
    $file = fopen($txt,"a+");
    $size = sizeof(file($txt));
    
    if ($size > 0){
      fputs($file, "\r\n");
    }  
    
    for ($i = 0; $i < 4; $i++){
       if ($i < 3){
           fputs($file, $input[$i].",");
       }else{
           fputs($file, $input[$i]);
       }
    }
    
    $_SESSION['GetParameters'] = 0;
    fclose($file);
  }
  
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
      
      echo '<tr><td>',($n+1),'</td>';
      
      for ($i = 0; $i < 4; $i++){
          echo '<td>',$word[$i],'</td>';
      }
      
      $delete = "index.php?del=".$n;
      
      echo '<td><a href='.$delete.'><img src="../photo/remove.png" height=18></a></td></tr>';
      $n++;
    }
  }
  echo '</table><a href="form.php"><div width=100% class="button">ДОБАВИТЬ</div></a>';
?>
    
  </body>
</html>

