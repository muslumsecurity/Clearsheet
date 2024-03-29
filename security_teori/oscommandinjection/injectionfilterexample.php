<?php

class SystemManager {
  
  public function checkVariable($userInputData) {
    return isset($userInputData);
  }
  
  public function filterUserInputData($userInputData) {
    $cleanInputData = str_replace(['||', '&&'], '', $userInputData);
    return $cleanInputData;
  }

  public function toRunOnSystem($userInputData) {
    $cleanedInputData = $this->filterUserInputData($userInputData);
    
    // Temizlenmiş girdinin geçerli bir IP adresi olup olmadığını kontrol et
    if (filter_var($cleanedInputData, FILTER_VALIDATE_IP)) {
        // Ping komutunu çalıştır ve çıktıyı $output dizisine, dönüş değerini ise $return_var değişkenine at
        exec("ping ".$cleanedInputData, $output, $return_var);
        
        // Ping işlemi başarılı ise
        if ($return_var == 0) {
            return ["Message" => "Ping Başarılı"];
        } else {
            return ["Message" => "Ping Başarısız"];
        }
    } else {
        // Geçersiz IP adresi
        return ["Message" => "Geçersiz IP adresi"];
    }
}


  public function checkEmptyData($userInputData) {
    return !empty($userInputData);
  }
}

$SystemManager = new SystemManager;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $userInputData = $_GET['userData'];
  if ($SystemManager->checkVariable($userInputData) && $SystemManager->checkEmptyData($userInputData)) {
      echo json_encode($SystemManager->toRunOnSystem($userInputData));
  }
}

?>
