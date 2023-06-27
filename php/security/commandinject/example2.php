<html>
  <head></head>
  <body>
    
    <form action="" method="post">
      <input type="text" name="data">
      <input type="submit" name="gonder">
    </form>   


        <?php
    
          function execute($value){
            return shell_exec('ping'.$value);
          }

          function filter($value){
              $filter = array(
                '&&' => '',
                '||' => '');

              $process = str_replace(array_keys($filter),$filter,$value);
              return $process;
          }
    
        
        if(!isset($_POST['gonder'])){
                echo 'veri yok';
                }else{
                    $value = $_POST['data'];
                    $filter = filter($value);
                    echo execute($filter);
                }
    
    
    
        ?>
    

    
  </body>

  
</html>
