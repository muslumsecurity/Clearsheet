<--İNSERT --> 
     $con=mysqli_connect("localhost","root","password","db") or die("Hata");
     $sql="insert into xss (data) values ('".$comments."')";
     $res=mysqli_query($con,$sql);
     mysqli_close($con);
     
<-- UPDATE -->
     $con=mysqli_connect("localhost","root","password","db") or die("Hata");
     $sql="update table data = '".$comments."' ";
     $res=mysqli_query($con,$sql);
     mysqli_close($con);
 
<-- DELETE -->
     $con=mysqli_connect("localhost","root","password","db") or die("Hata");
     $sql="delete from table where data = '".$comments."' ";
     $res=mysqli_query($con,$sql);
     mysqli_close($con);
     
<-- SEARCH -->     
     
     $search_value = $_GET["search"];
     $con= new mysqli("localhost","root","","xssstored");
     if($con->connect_error){
       echo 'Connection Faild: '.$con->connect_error;
       }else{
        $sql="select * from xss where data like '%$search_value%'";
        $res=$con->query($sql);
        while($row=$res->fetch_assoc()){
          foreach ($row as $key => $value) {
            echo $value."<br/>";
          }
         }
         }
<form action="" method="get">
  <input type="text" name="search">
  <input type="submit" value="gonder">
</form>
  
  
  
  <-- TRUE - FALSE -->  
 <?php
$search_value = $_GET["search"];
$con= new mysqli("localhost","root","","xssstored");

if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        $sql="select count(*) as cntUser from xss where data like '%$search_value%'";
        $res=$con->query($sql);
        $row=$res->fetch_assoc();
        $count = $row['cntUser'];
      
        if ($count > 0) {
            echo "var";
          }else {
            echo 'yok';
          }



            }


?>


<form action="" method="get">
  <input type="text" name="search">
  <input type="submit" value="gonder">
</form>
