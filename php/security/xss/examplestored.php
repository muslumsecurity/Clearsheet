<html>
  <head></head>
  <body>

    <?php
    
     function insert_db($value){
       $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root'); 
       $sql  = "INSERT INTO htmlinjection (wall) VALUES ('".$value."')";
       $pdo->query($sql);
        }

     function list_details(){
         $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root');
         $sql = "SELECT * FROM htmlinjection";
        
        foreach ($pdo->query($sql) as $row) {
           return $row['wall'];
           }
          }

     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['data'])){
          $value = $_POST['data'];
          insert_db($value);
          }
         }
     ?>

    <form action="" method="post">
      <input type="text" name="data">
      <input type="submit" value="gonder">
    </form>

    <center>
    <h1>wall</h1>
    <?php list_details();?>
    </center>


    </body>
</html>
