<?php

class StringManager{
  public function checkVeriable($requestData){
    return isset($requestData);
  }
  public function checkEmpty($requestData){
    return !empty($requestData)
    
  }
  public function requestHandle($requestData){
    return $requestData;    
  }

}

$StringManager = new StringManager;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $requestData = $_GET['userData'];
  if($StringManager->checkVeriable($requestData) && $StringManager->checkEmpty($requestData)){
    echo $StringManager->requestHandle($requestData);
  }
}


?>




<form action="" method="">
  <input type="text" name="userData" >
  <input type="submit" value="gonder">
</form>
