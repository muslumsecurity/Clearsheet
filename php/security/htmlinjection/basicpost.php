<html>
  <head></head>
  <body>

    <?php 
      function Ekrana_bastir($value){
          return $value;
      }
      
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['data'])){
        $value = $_POST['data'];
        $data = Ekrana_bastir($value);
        echo $data;
      }

    ?>
    
    
    <form action="" method="post">
      <input type="text" name="data">
      <input type="submit" value="gonder">
    </form>

  


  
  </body>
</html>
