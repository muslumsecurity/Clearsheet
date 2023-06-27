<html>
  <head></head>
  <body>
    
  <form action="" method="post">
    <input type="text" name="data">
    <input type="submit" name="gonder">
  </form> 

    <?php

      $data = $_POST['data'];
      $process = shell_exec('ping'.$data);
    
      echo "</pre>";
      echo $process;      
      echo "</pre>";


    ?>
    
  </body>
</html>





