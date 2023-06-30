<html>
<head></head>
  <body>

    <form action="" method="post">
      <input type="text" name="data">
      <input type="submit" value="gonder">
    </form>


    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
      
      function htmlspecial($value){
      	 $clean = htmlspecialchars($value); // guvenli kod htmlspecialchars
      	 return $clean;
      }
	
      function list_db(){
	$con=mysqli_connect("localhost","root","root","hack") or die("Hata");
	$sql="select id, wall from htmlinjection";
	$res=$con->query($sql);
	  while($row = $res->fetch_assoc()){
		echo $row['wall'] ."<form action='' method='post'><input type='hidden' value=".$row['id']." name='id'><input type='submit' value='sil'></form><br/>";
                  }  
               }


      function insert_db($value){
        $con=mysqli_connect("localhost","root","root","hack") or die("Hata");
        $sql="insert into htmlinjection (wall) values ('".$value."')";
        $res=mysqli_query($con,$sql);
        mysqli_close($con);
      }
      
      function delete_db($data){
       $con=mysqli_connect("localhost","root","root","hack") or die("Hata");
       $sql="delete from htmlinjection where id = '".$data."' ";
       $res=mysqli_query($con,$sql);
       mysqli_close($con);
      }


      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['data'])){
          $data_veriable = $_POST['data'];
          $clean = htmlspecial($data_veriable);
          insert_db($clean);
        }elseif(isset($_POST['id'])){
          $data = $_POST['id'];
          delete_db($data);	        
        }
        
      }
        ?>

      <center>
        <li><?php list_db(); ?></li>
      </center>    

    
  </body> 
</html>




