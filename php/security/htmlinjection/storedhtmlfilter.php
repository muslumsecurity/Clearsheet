<html>
  <head></head>
  <body>


    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
      
      function filter($value){
          $array = array(
            '<h1>' => '',
            '<h2>' => '',
            '<script>'=> ''
          );
        
          $data = str_replace(array_keys($array),$array,$value);
          return $data;
      }
      
      function connect_db(){
      	return $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root');
      
      }
      
      function write_db($value){
      	 $pdo = connect_db();
         $sql = "INSERT INTO htmlinjection (id,wall) VALUES (NULL,'".$value."')";
         $pdo->query($sql);
      
      }
      
      function Data_show(){
      	$pdo = connect_db();
      	$sql = "SELECT * FROM htmlinjection";
      	foreach ($pdo->query($sql) as $row) {
      	    echo "<li>{$row['id']} ({$row['wall']})</li>";
	          }
      
      }
  

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['data'])){
          $data = $_POST['data'];
          $clean_data = filter($data);
          write_db($clean_data);
        }
      }
  

    ?>

    
    
    <center>
      <form action="" method="post">
        <textarea cols="40" rows='4' name='data'></textarea>
        <input type="submit" value="gonder">
      </form>
    </center>

	<center>
	<h1>wall</h1>
	<?php data_show();?>
    	</center>
    
  </body>
</html>
