<?php
header("X-XSS-Protection:0");
if($_SERVER['REQUEST_METHOD'] == "GET"){
  $name = $_GET['name'];
  echo "Merhaba $name<br/>";
  echo "<a id='link' href=""http://www.google.com">Indırme Lınkı</a>';
}


?>


<form action="" method="get">
  <input type="text" name="name"/>
  <input type="submit" value="gonder"/>
</form>
