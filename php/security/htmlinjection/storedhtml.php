<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="header">
            <h1>&copy; <span>Wa</span><span class="boxed">LL</span></h1>
        </div>
        <div id="content">
            <form action="" method="post">
                <textarea cols="40" rows="4" name="data"></textarea><br>
                <input type="submit" value="Walling" name="share"/>
            </form>
            <span class="boxed"><h2>Walling</h2></span>
            <?php 
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                $pdo = new PDO('mysql:host=localhost;dbname=hack', 'root', 'root');

                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    if(isset($_POST['share'])){
                        $data = $_POST['data'];
                        $sql = "INSERT INTO htmlinjection (id,wall) VALUES (NULL,'".$data."')";
                        $pdo->query($sql);
                    } elseif(isset($_POST['id'])){
                        $delete = $_POST['id'];
                        $sql = "DELETE FROM htmlinjection  where id=$delete";
                        $pdo->query($sql); 	
                    }
                }

                $results_per_page = 5;
                $sql = "SELECT * FROM htmlinjection";
                $stmt = $pdo->query($sql);
                $number_of_results = $stmt->rowCount();
                $number_of_pages = ceil($number_of_results / $results_per_page);
                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $this_page_first_result = ($page - 1) * $results_per_page;
                $sql = "SELECT * FROM htmlinjection LIMIT " . $this_page_first_result . ',' .  $results_per_page;
                foreach($pdo->query($sql) as $row){
                    echo "<li>{$row['id']}.{$row['wall']}<form action='' method='post'><input type='hidden' value={$row['id']} name='id'><input type='submit' value='sil'></form></li>";
                }
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
                }
            ?>
        </div>
    </body>
</html>
