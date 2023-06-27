<html>
  <head></head>
  <body>

    <form action="" method="">
      <input type='text' name='data'>
      <input type='submit' value="gonder" name="gonder">
   </form>


  <?php

    function filter($value){
        $process = escapeshellcmd($value); // escapeshellcmd gelen veriyi temizliyor.
        return $process;
      
    }

    function execute($value){
        $process = shell_exec($value);
        return $process ;
    }

    if(!isset($_POST['gonder'])){
          
          echo 'degisken yok';
      
      }else{
        
          $value = $_POST['data'];
          $filter = filter($value); // temizle
         
          echo '<pre>';
          echo execute($filter);
          echo '</pre>';
      }



?>



  <body>
</html>

