<?php

class HttpStatusCodeService{
       public function statusCodeMethod($inputData){
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
                $userData = $filePath;
                $data = file_get_contents('php://input');
                if(file_exists($filePath)){
                        unlik($filePath);
                        $response = ["message" => "Dosya başarıyla silindi."];
                        return $response;
                }else{
                        $response = ["message" = "Dosya bulunamadı."];
                        return $response;
                }
        }
        public function putMethod($requestData){
        }
        public function patchMethod($requestData){
        }
}

$httpMethodService = new HttpMethodsService;


if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['UserData']) && !empty($_GET['UserData'])){
                echo $htttMethodService->getMethod($_GET['UserData']);
                     $httpMethodService->statusCodeMethod(200);
        }else{
                echo 'veri yok';
                $httpMethodService->statusCodeMethod(100);
        }
}elseif($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if(isset($_GET['UserData']) && !empty($_GET['UserData'])){
                }        
}elseif($_SERVER['REQUEST_METHOD'] == 'PUT'){
        
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['UserData']) && !empty($_POST['UserData'])){
                
        }
}
?>


