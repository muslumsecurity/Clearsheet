<html>
  <head></head>
  <body>

    <form action="" method="get">
        <input type="text" name="data">
        <input type="submit" value="gonder">
    </form>

    <?php

        function Show_Me($value){
            return $value;          
        }

        if($SERVER['REQUEST_METHOD'] == 'GET'){
          if(isset($_GET['data'])){
            $value = $_GET['data'];
            $query = ShowMe($value);
            echo $query;
          }
        }
  
    ?>
    
  </body>
</html>
