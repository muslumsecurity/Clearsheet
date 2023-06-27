<html>
<head></head>
<body>


  <?php ?

  function include_iframe($path){
        echo '<iframe src="'.$path.'" width="100%" height="300">
          <p>Tarayıcınız iframes\'i desteklemiyor.</p>
            </iframe>';
    
      }

    

    $path = $_GET['path'];
    include_iframe($path);

    
    
    >


  
</body>
</html>
