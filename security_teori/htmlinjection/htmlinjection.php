<?php

class DatabaseMangement{
  private $host = "localhost" ;
  private $databaseName  = "basic";
  private $userName = "root";
  private $userPassword = "";
  
  private function ConnectToDatabase(){
     $conn = new PDO("mysql:host=$this->host;dbname=$this->databaseName", $this->userName, $this->userPassword);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $conn;
  }
  public function GetToDatabase(){
    $conn = $this->ConnectToDatabase();
    $sql = "SELECT * FROM basics";
    $response = array();
    foreach ($conn->query($sql) as $row) {
        $response[] = array(
            'username ->' => $row['username'],
            'apikey ->' => $row['apikey']
        );
    }
    return $response;
}

private function UniqueIdWithPrefix(){
    $uniqueIdWithPrefix = uniqid();
    return $uniqueIdWithPrefix;
}

public function InsertToDatabase($userName,$userPassword){
    $conn = $this->ConnectToDatabase();
    $uniqid = $this->UniqueIdWithPrefix();
    $sql = "INSERT INTO basics (username,password,apikey) VALUES ('$userName', '$userPassword','$uniqid')";
    if($conn->query($sql)){
        $response = array("Message" => "Eklendi.");
    }else {
        $response = array("Message" => "Eklenemedi.");
    }
    return $response;
}

}

class StringManagement{
  public function CheckVeriable($userInputData){
    return isset($userInputData);
  }
  public function CheckEmpty($userInputData){
    return !empty($userInputData);
  }
}


$databaseManagement = new DatabaseMangement;
$StringManagement = new StringManagement;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    if ($StringManagement->CheckVeriable($userName)&& $StringManagement->CheckVeriable($userPassword)) {
        if ($StringManagement->CheckEmpty($userName) && $StringManagement->CheckEmpty($userPassword)) {
            echo json_encode($databaseManagement->InsertToDatabase($userName,$userPassword));
        }else {
            $response = json_encode("Empty..");
        }
    }else {
        $response = json_encode('Get Veriable');
    }
}

?>

<html>
  <head></head>
  <body>
      <form action="" method="post">
          Username<input type="text" name="userName"><br/>
          Password<input type="password" name="userPassword"><br/>
          <input type="submit" value="Ekle">
      </form><br/>
      <h1>Uyeler</h1>
      <?php  echo json_encode($databaseManagement->GetToDatabase(),JSON_PRETTY_PRINT); ?>
    
  </body>
</html>



