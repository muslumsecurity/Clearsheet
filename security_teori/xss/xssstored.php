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

    public function listsDatabase() {
        $pdo = $this->connectToDatabase();
        // Basit bir temizleme işlemi (tam bir güvenlik sağlamaz)
        
        
        $sql = "SELECT * FROM users";
        $response = [];
        foreach ($pdo->query($sql) as $row) {
            $response[] = $row;
        }

        return $response;
    }

    public function userInsert($userName,$userPassword,$userRole){
        $pdo = $this->connectToDatabase();
        $sql = "INSERT INTO users (username, password , role ) VALUES ('$userName', '$userPassword', '$userRole')";
        $pdo->query($sql);

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
      <input type="text" name="userName" placeholder="Username">
      <input type="text" name="userPassword" placeholder="Password">
      <input type="text" name="userRole" placeholder="User Role">
      <input type="submit" value="ekle"><br/>
      </form>
    <pre>---------------------------------------------------------------</pre>
    <?php 
      $databaseManagement = new DatabaseManagement;
     

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        $userRole = $_POST['userRole'];
  
        $databaseManagement->userInsert($userName,$userPassword,$userRole);
      }
      

      $json = $databaseManagement->listsDatabase();
      foreach ($json as $key) {
        echo "İd : " . $key['id']."<br/>";
        echo "Username : ". $key['username']."<br/>";
        echo "Password : " . $key['password']."<br/>";
        echo "Role : " . $key['role']."<br/>";
        echo "<br/>";
      }        
    ?>

  
   
  </body>
</html>
