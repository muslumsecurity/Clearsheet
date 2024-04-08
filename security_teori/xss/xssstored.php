<?php

class DatabaseManagement{
  private $host = "" ;
  private $dbname = "" ;
  private $dbpassword = "" ;
  private $dbusername = "" ;

  private function connectToDatabase(){
   $pdo = new PDO('mysql:host=$this->host;dbname=$this->dbname', '$this->dbusername', '$this->dbpassword');
   return $pdo;
  }

  public function listsDatabase(){
      $pdo = parents::connectToDatabase;
      $sql = "SELECT * FROM tablo_adi where name= $userSearchQuery";
      $response = [];
      foreach ($pdo->query($sql) as $row) {
          $response[] =  $row;
      }
    
      return $response;
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
    <forma action="" method="post">
      <input type="text" name="userData">
      <input type="submit" value="Listele">
    ---------------------------------------------------------------
    <?php 
      $databaseManagement = new DatabaseManagement;
      $userData = $_POST['userData'];
      echo $databaseManagement->listsDatabase($userData);
        
    ?>

  
    </form>
  </body>
</html>
