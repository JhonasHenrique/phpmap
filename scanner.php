<!DOCTYPE HTML>
<html lang="pt-br">
   <head>
    <meta charset="utf-8">
       <title>PHP MAP</title>
      </head>
<body bgcolor="black">
   <hr>
   <center><p><font color="#00FF00">PHP MAP</font></p></center>
       <hr>
          <br>
 <center><form name="cmd" action="?" method="POST">
     <font color="#00FF00">Alvo: </font><input type="text" name="host"  placeholder="Digite seu host!" required/>
     <input type="submit" value="Scan"/>
      <form></center>
         <br>
          <br>
     <hr>
        <br>
     <?php
      if(isset($_REQUEST['host'])){
         error_reporting(0);
         $host = ADDSLASHES($_REQUEST['host']); 
         $g_name = gethostbyname($host);
         $lista_p = range(0,65536);
         $arm_p = array();
         foreach($lista_p as $test_p){
         $s = socket_create(AF_INET, SOCK_STREAM, 0);
         if(socket_connect($s, $g_name, $test_p)){
             array_push($arm_p, $test_p);
         }
         }
        foreach($arm_p as $r){
            echo "<center>"."<font color='red'>".$r." "."Open!"."</font>".nl2br("\n\n")."</center>";
         }
      }
     ?> 
      <hr>
    </body>
       </html>
