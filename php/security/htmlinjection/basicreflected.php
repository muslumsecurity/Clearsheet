<html>
  <head></head>
  <body>
    <center>
    <form action="" method="get">
      <textarea cols="40" rows="4" name="data"></textarea><br/>
      <input type="submit" value="Gonder"/>
    </form> 
    </center>
    <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      function url_encoding($userInput){
        $encodedInput = urlencode($userInput);
        return $encodedInput;
      }

      function insert_db($value){
        $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root');
        $sql = "INSERT INTO htmlinjection (wall) VALUES ('".$value."')";
        $pdo->query($sql);
      }

      function list_db(){
        $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root');
        $sql = "SELECT * FROM htmlinjection";
        foreach ($pdo->query($sql) as $row) {
           echo "<center><li>";
           echo $row['id'].' '.$row['wall'];
           echo "</li></center>";
        }
      }

      if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['data'])){
          $veriable_data = $_GET['data'];
          $encoded_fonc = url_encoding($veriable_data);
          insert_db($encoded_fonc);
        }
      }
      
    ?>
    <center><h2>WALL</h2></center>
    <?php list_db(); ?>
  </body>
</html>
