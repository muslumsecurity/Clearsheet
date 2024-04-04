<?php

class StringManager{
  public function protectFilter($userInputData){
    $response = preg_replace('/script/',"",$userInputData);
    return $response;
  }
}


$StringManager = new StringManager;
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $userInputData = $_GET['userData'];
  echo $StringManager->protectFilter($userInputData);
}
  
?>




<form action="" method="get">
  <input type="text" name="userData">
  <input type="submit" value="gonder">
</form>
