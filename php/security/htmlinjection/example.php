
<html>
<head></head>
  <body>

    <center>
    <h1> YORUM KUTUSU </h1>
    <form action="" method="get">
      <textarea cols="40" rows="4" name= "data"></textarea>
      <input type="submit" value="paylas" name="share"/>
    </form>

    <?php 

      

        $db = new PDO("mysql:host=localhost;dbname=htmlinj","root","password");

// --------------------------------- ekleme kısmı ----------------------
        if(!isset($_POST['gonder'])){
              echo 'form gönderilemedi';          
        }else{
            if(empty($_POST['data'])){
              echo 'birşeyler yazın';
            }else{
              $value = $_POST['data'];
              $sqlquery = "INSERT INTO walling ('wall') VALUES ('$value')";
              $db ->query($sqlquery);
            }
            
        }


// --------------------- listeleme kısmı --------------------------
       $list = 'SELECT * FROM comment';
       $run = db->query($list);

      echo "<center> <h1> YORUMLAR <h1></center>";
      if(!$run){
        echo 'Listeleme gerçekeleştirilemiyor.';
      }else{
        foreach($run as $row){ ?>
          <p>Yorum : <?php echo $row['wall']?></p>
      <?php 
        }
      }


    ?>

  </center>  



    
  </body>
</html>
