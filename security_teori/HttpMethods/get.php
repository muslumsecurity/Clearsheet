<?php

class HttpMethodService{
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
                if($_SERVER['REQUEST_METHOD'] == 'DELETE'){
                        if(file_exist($filePath)){
                                unlik($filePath);
                                $response = ["message" => "Dosya başarıyla silindi."];
                                return $response;
                        }else{
                                $response = ["message" = "Dosya bulunamadı."];
                                return $response;
                        }
                }
        }
        public function putMethod($requestData){
        }
        public function patchMethod($requestData){
        }
}

class HttpStatusCodeService{
       public function informationalMethod($inputData){
               return http_status_code($inputData);
       }
       public function successMethod($inputData){
               return http_status_code($inputData);
       }
       public function redirectionMethod($inputData){
               return http_status_code($inputData);
       }
       public function clientErrorMethod($inputData){
               return http_status_code($inputData);
       }
       public function serverErrorMethod($inputData){
               return http_status_code($inputData);
       }
  
       
}



?>
