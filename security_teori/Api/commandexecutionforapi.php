<?php

class userSystemManagement{
    private $host = "localhost" ;
    private $databaseName  = "basic";
    private $userName = "root";
    private $userPassword = "";

    private function ConnectToDatabase(){
        $conn = new PDO("mysql:host=$this->host;dbname=$this->databaseName", $this->userName, $this->userPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

    public function CheckApi($userApi){
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

    public function ToSystemRunOn($userInput){
        $response = array('Message' => exec($userInput));
        return $response;
    }


    public function CheckEmptyData($userInputData){
        return !empty($userInputData);
    }

    public function CheckVariable($userInputData){
        return isset($userInputData);
    }

}

$userSystemManagement = new userSystemManagement;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userapi = $_GET['UserApi'];
    $systemcommand = $_GET['systemCommand'];
    if ($userSystemManagement->CheckEmptyData($userapi)) {
        if ($userSystemManagement->CheckVariable($userapi)) {
            switch ($_GET['api']) {
                case 'users':
                 {
                  if ($userSystemManagement->CheckApi($userapi)) {
                    if($userSystemManagement->ToSystemRunOn($systemcommand)){
                       echo json_encode($userSystemManagement->ToSystemRunOn($systemcommand));
                    }else {
                        $response = array("Message" => "Not execution");
                        echo json_encode($response);
                    }
                  }else {
                    $response = array("Message" => "User Api Not found");
                    echo json_encode($response);
                  }

                 }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
       
    }else {
        $response = array("Message" => "Api key alanı doldurulmalıdır.");
        echo json_encode($response);
    }
    
}









?>
