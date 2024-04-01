<?php

class databaseManagement{
    private $host = "localhost";
    private $databasename  = "basic";
    private $dbusername  = "root";
    private $dbpassword  = "";

    private function ConnectToDatabase(){
        $conn = new PDO("mysql:host=$this->host;dbname=$this->databasename", $this->dbusername, $this->dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }   
    public function CheckApiKey($userApi){
        $conn = $this->ConnectToDatabase();
        $query = "SELECT * FROM basics WHERE apikey = '$userApi'";
        $result = $conn->query($query);
    
    // Kullanıcıyı kontrol et
        if ($result && $result->rowCount() > 0) {
            // Kullanıcı bulundu
            $response = true;
            return $response;
        } else {
        // Kullanıcı bulunamadı veya parola hatalı
            $response = false;
            return $response;
    }
        
    }
    public function UserCheckOnDatabase($userName,$userPassword){
        $conn = $this->ConnectToDatabase();
        $query = "SELECT * FROM basics WHERE username = '$userName' AND password = '$userPassword'";
        $result = $conn->query($query);
    
    // Kullanıcıyı kontrol et
        if ($result && $result->rowCount() > 0) {
        // Kullanıcı bulundu
            $response = array("Username" => $userName,"Message" => "Kullanıcı var.");
            return $response;
        } else {
        // Kullanıcı bulunamadı veya parola hatalı
            $response = array("Message" => "Kullanıcı adı veya parola hatalı!");
            return $response;
        }
     }

    public function CheckVariable($userInputData){
        return isset($userInputData);
    }
}


switch ($_GET['data']) {
     case 'users':
         $userName = $_GET['userName'];
         $userPassword = $_GET['userPassword'];
         $userApi = $_GET['userApi'];
         $databaseManagement = new databaseManagement;

         if (@$databaseManagement->CheckApiKey($userApi)) {
            if ($databaseManagement->CheckVariable($userName) && $databaseManagement->CheckVariable($userPassword)) {
                echo json_encode($databaseManagement->UserCheckOnDatabase($userName,$userPassword),JSON_UNESCAPED_UNICODE );
             }
         }else {
            $response = array('Message' => 'Not found Api Key');
            echo json_encode($response,JSON_UNESCAPED_UNICODE );
         }
         break;
      
         default:
        echo json_encode('Error.',JSON_UNESCAPED_UNICODE );
        }





?>
