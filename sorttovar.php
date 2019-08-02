<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../styles/index.style.css">
    <title>СПИСОК ТОВАРОВ</title>
</head>
<body>

  <table width=100%>
  <tr>
  <th> № </td>
  <th> товар </th>
  <th> магазин </th>
  <th> цена </th>
  <th> кол-во </th>
  </tr>
    
	<?php
    session_start();
    
    if ($_SESSION["FileName"] == NULL){
     header("Location: SetFile.php");
    }
    
    $_SESSION['GetParameters'] = 0;
    
    $n = 0;
    $j = 0;
    
    $txt = "./docs/".$_SESSION["FileName"].".txt";        
    $buf = fopen("./docs/buffer.txt",'w+');
		$array=file($txt);
    
    $size = count($array);
    
    if ($size > 1){        
    while($size>$j){
      $i = 0;
      $j = 1;
      
      $temp = '';
      
      while($size>$i) {
        $word = explode(",", $array[$i]);
        if (strnatcasecmp($temp,$word[0]) == 1){
          $invertor = $array[$i];
          $array[$i] = $array[$i-1];
          $array[$i-1] = $invertor;
        }else{
          $j++;
        }
        
        $temp = $word[0];
        $i++;
      }
    }  
    }        
    $j = 0;
                      
		while($size!=$j)
		{
			$word = explode(",", $array[$j]);
      fwrite($buf,$array[$j]);
      
      echo '<tr><td>',(1+$n++),'</td>
      <td>',$word[0],'</td>
      <td>',$word[1],'</td>
      <td>',$word[2],'</td>
      <td>',$word[3],'</td></tr>';       
                  
			$j++;
		}  
    
    echo '</tr></table>';        
	fclose($buf);
		
	?>
<form action="index.php" method="POST">
     
        <h1 align="center"> Сохранить как</h1>
        <div align="left"> 
          <p>Новое имя					<input type="text" name="newname" size="50">.txt
		  
          <p><input type="submit" >
		</div>  
</form>
</body>
</html>
