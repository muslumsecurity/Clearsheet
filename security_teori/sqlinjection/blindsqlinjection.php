<?php

class DatabaseManagement{
    private $host = "localhost";
    private $dbname = "hactivist";
    private $dbusername = "root";
    private $dbpassword = "";

    private function connectToDatabase() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO($dsn, $this->dbusername, $this->dbpassword, $options);
    }

    public function listsDatabase($userSearchQuery) {
        $pdo = $this->connectToDatabase();
        // Basit bir temizleme işlemi (tam bir güvenlik sağlamaz)
        
        
        $sql = "SELECT * FROM users WHERE username = '$userSearchQuery'";
        $response = [];
        foreach ($pdo->query($sql) as $row) {
            $response[] = $row;
        }

        return $response;
    }
}

class StringManagement{
  public function userInputSanitazion(){
  }

  public function checkInputVeriable(){
  }
}


?>



<html>
<head></head>
  <body>
    <form action="" method="post">
      <input type="text" name="userData">
      <input type="submit" value="Listele"><br/>
      </form>
    <pre>---------------------------------------------------------------</pre>
    <?php 
      $databaseManagement = new DatabaseManagement;
      $userData = $_POST['userData'];
      $json = $databaseManagement->listsDatabase($userData);      
    ?>

  
   
  </body>
</html>
