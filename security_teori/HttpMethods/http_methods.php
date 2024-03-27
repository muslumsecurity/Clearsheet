<?php

class HttpStatusCodeService{
       protected function statusCodeMethod($inputData){
               return http_response_code($inputData);
       }
}


class HttpMethodService extends HttpStatusCodeService{
        public function getMethod($requestData){
                $userData = $requestData;
                return $userData;
        }
        public function postMethod($requestData){
                $userData = $requestData;
                return $userData;
        }
        public function deleteMethod($filePath){
               $data = file_get_contents('php://input'); 
               $userData = $filePath; 
                if(file_exists($filePath)){
                        unlik($filePath);
                        $response = ["message" => "Dosya başarıyla silindi."];
                        parent::statusCodeMethod(200);
                        return $response;
                        
                }else{
                        $response = ["message" = "Dosya bulunamadı."];
                        parent::statusCodeMethod(404);
                        return $response;
                }
        }
        public function putMethod($filePath,$fileName){  
               if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
                     $data = file_get_contents('php://input');
                     $fileName = $filePath."/".$fileName;
                     if(file_put_contents($fileName,$data))){
                            $response = ["Message" => "Success.. ->" , $fileName];
                            parent::statusCodeMethod(200);
                     }else{
                            $response = ["Message" => "Unsucess"];
                            parent::statusCodeMethod(404);
                     }
               }
               
              
               
        }
        public function patchMethod($requestData){
        }
}

$httpMethodService = new HttpMethodService(); // Örnek bir HttpMethodService sınıfı oluşturulduğunu varsayalım.

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['UserData']) && !empty($_GET['UserData'])) {
            echo $httpMethodService->getMethod($_GET['UserData']);
            $httpMethodService->statusCodeMethod(200);
        } else {
            echo 'veri yok';
            $httpMethodService->statusCodeMethod(100);
        }
        break;
    case 'DELETE':
        if (isset($_GET['FilePath']) && !empty($_GET['FilePath'])) {
           echo json_encode($httpMethodService->deleteMethod($_GET['FilePath']));
        }
        break;
    case 'PUT':
       if (isset($_GET['filePath']) && !empty($_GET['filePath']) && isset($_GET['fileName']) && !empty($_GET['fileName'])){
              echo $httpMethodService->putMethod($_GET['filePath'] , $_GET['FileName']);
       }
        break;
    case 'POST':
        if (isset($_POST['UserData']) && !empty($_POST['UserData'])) {
            // POST işlemleri buraya gelecek
        }
        break;
    default:
        // Geçersiz istek durumu
        $httpMethodService->statusCodeMethod(400);
        break;
}
?>





?>


