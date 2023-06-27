<html>
  <head></head>
  <body>

  <form action="" method="post">
    <input type="text" name="data">
    <input type="submit" value="gonder" name="button">
  </form>



  <?php

  function ekranabastir($vlaue){
      echo $value; // direk ekrana bastırıyor. xss zafiyeti
  }



  if(!isset($_POST['button'])){ // formun gönderilip gönderilmediğine bakıyor.
    echo 'form boş';
  }else{
    if(empty($_POST['data'])){ // formun doldurulup doldurulmadığına bakıyor.
      echo 'veri yok';
    }else{
      $value = $_POST['data']; // değişkeni $value değişkeni içerisine atıyor.
      ekranabastir($value); // Kullanıcıdan gelen girdiyi ekranabastir fonksiyonu içerisinde ekrana bastırıyor.
    }
  }



  ?>

    
  </body>
</html>
