<html>
  <head></head>
  <body>

  <form action="" method="post">
    <input type="text" name="data">
    <input type="submit" value="gonder" name="button">
  </form>



  <?php

  function ekranabastir($vlaue){
      echo $value;
  }



  if(!isset($_POST['button'])){
    echo 'form boş';
  }else{
    if(empty($data)){
      echo 'veri yok';
    }else{
      $value = $_POST['data'];
      ekranabastir($value);
    }
  }



  ?>

    
  </body>
</html>
