<?php

class ServiceClient{
  public function CheckVeriable($userDataInput){
    return isset($userDataInput);
  }
  public function CheckEmpty($userDataInput){
    return !empty($userDataInput);
  }
  public function IframeWindow($iframe_src){
    $response = "<iframe src='$iframe_src' width='600px' height='400px' frameborder='0'></iframe>";
    return $response;
  }
}


$ServiceClient = new ServiceClient;

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $webPage = $_GET['webpage'];
  if($ServiceClient->CheckVeriable($webPage)){
    if($ServiceClient->CheckEmpty($webPage)){
      echo $ServiceClient->IframeWindow($webPage);
    }
  }
}



?>
