<?php
// http metodları kullanılarak zaafiyetli kodlar ve denemeler.
class HttpStatusCodeService {
    public function statusCodeMethod($inputData) {
        http_response_code($inputData);
    }
}

class HttpMethodService extends HttpStatusCodeService {
    public function getMethod($requestData) {
        $userData = ['Message' => $requestData];
        return json_encode($userData);
    }

    public function postMethod($requestData) {
        $userData = $requestData;
        return json_encode($userData);
    }

    public function deleteMethod($filePath) {
        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                $response = ["message" => "Dosya başarıyla silindi."];
                parent::statusCodeMethod(200);
            } else {
                $response = ["message" => "Dosya silinirken bir hata oluştu."];
                parent::statusCodeMethod(500);
            }
        } else {
            $response = ["message" => "Dosya bulunamadı."];
            parent::statusCodeMethod(404);
        }
        return $response;
    }

    public function putMethod($filePath, $fileName) {
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $data = file_get_contents('php://input');
            $filePath = rtrim($filePath, '/'); // Sonunda / karakteri varsa kaldır
            $filePath = $filePath . '/' . $fileName; // Dosya yolu ile dosya adını birleştir
            if (file_put_contents($filePath, $data)) {
                $response = ["message" => "Dosya başarıyla kaydedildi.", "file_path" => $filePath];
                parent::statusCodeMethod(200);
            } else {
                $response = ["message" => "Dosya kaydedilirken bir hata oluştu."];
                parent::statusCodeMethod(500);
            }
            return $response;
        }
    }

    public function patchMethod($requestData) {
        // PATCH metodu için gerekli işlemler burada yapılacak
    }
}

$httpMethodService = new HttpMethodService(); // HttpMethodService sınıfından bir örnek oluştur

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
        if (isset($_GET['filePath']) && !empty($_GET['filePath']) && isset($_GET['fileName']) && !empty($_GET['fileName'])) {
            echo json_encode($httpMethodService->putMethod($_GET['filePath'], $_GET['fileName']));
        }
        break;
    case 'POST':
        if (isset($_POST['UserData']) && !empty($_POST['UserData'])) {
            echo $httpMethodService->postMethod($_POST['UserData']);
        } else {
            // POST verisi yoksa
            $httpMethodService->statusCodeMethod(400);
        }
        break;
    default:
        // Geçersiz istek durumu
        $httpMethodService->statusCodeMethod(400);
        break;
}
?>
