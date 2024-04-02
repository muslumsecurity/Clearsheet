<?php

class StringManagement{
    public function StringUrl($inputUserData){
        $filterString = [
            "<" => "&lt;",
            ">" => "&gt;",
            '"' => "&quot;",
            "'" => "&#039;",
            "&" => "&amp;"
        ];
    
        foreach ($filterString as $key => $value) {
            $inputUserData = str_replace($key, $value, $inputUserData);
        }
    
        // URL decode işlemi uygula
        $inputUserData = urldecode($inputUserData);
    
        return $inputUserData;
    }
    
    
    public function CheckVeriable($userInputDataü){
        return isset($userInputDataü);
    }
    public function CheckEmpty($userInputDataü){
        return !empty($userInputDataü);
    }
}

$stringManagement = new StringManagement;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $userInputData = $_GET['data'];
    if ($stringManagement->CheckVeriable($userInputData) && $stringManagement->CheckEmpty($userInputData)) {
        echo $stringManagement->StringUrl($userInputData);     
    }
}




?>

<form action="" method="get">
<input type="text" name="data">
<input type="submit" value="gonder">
</form<


