// Filtreleme yöntemiyle xss zafiyeti oluşturulmuştur.
// Bu örnekte xss stored gerçekleştiriliyor. Bu yüzden 

<html>
<head></head>
  <body>

    <form action="" method="post">
      <input type="text" name="data">
      <input type="submit" value="gonder">
    </form>


    <?php

      function filter($value){
        $array = array("/script/" => "" , "/<script>/" => "" );
        $process = str_replace(array_keys($array),$array,$value);
        return $process;
        
      }

      function list_db(){
        $con= new mysqli("localhost","root","","xssstored");
        $sql="select * from table_name";
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){
          foreach ($row as $key){
            echo $key['wall'];
            }
           }
        
      }

      function insert_db($value){
        $con=mysqli_connect("localhost","root","root","hack") or die("Hata");
        $sql="insert into table_name (wall) values ('".$value."')";
        $res=mysqli_query($con,$sql);
        mysqli_close($con);
      }


      if($_SERVER['REQUEST'] == POST){
        if(isset($_POST['data'])){
          $data_veriable = $_POST['data'];
          $filter_data = filter($data_veriable);
          insert_db($filter_data);
        }
        
      }
        ?>

      <center>
        <li><?php list(); ?></li>
      </center>    

    
  </body> 
</html>
