<?php

class StringManager{
  public function userInputData($userData){
    if (strstr($userData,"script")){
        $response = "Kotu payload";
        return $response;
    }else {
        return $userData;
    }
}
}
$StringManager = new StringManager;

if($_SERVER['REQUEST_METHOD'] == "GET"){
  $userData = $_GET['userData'];
  $response = $StringManager->userInputData($userData);
  echo $response;

}

?>


