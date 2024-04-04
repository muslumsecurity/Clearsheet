<?php

class StringManager{
  public function protectString($userInputData){
    $response = preg_replace('/<script>/i',"",$userInputData);
    $response = preg_replace('/<\/script>/i',"",$response);
    return $response;
  }
}

$StringManager = new StringManager;
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $userInputData = $_GET['userData'];
  echo $StringManager->protectString($userInputData);
}



?>



<form action="" method="get">
  <input type="text" name="userData">
  <input type="submit" value="gonder">
</form>
