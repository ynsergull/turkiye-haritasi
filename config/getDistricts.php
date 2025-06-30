<?php

require_once('db_config.php');

// Seçilen ilin plakasını POST isteği ile al
$plaka = $_POST['plaka'];

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// İlçeleri çek
$sql_ilceler = "SELECT ilce_adi, ilce_adi_tr FROM ilceler WHERE il_id = ? ORDER BY ilce_adi_tr ASC";
$stmt = $conn->prepare($sql_ilceler);
$stmt->bind_param("s", $plaka);
$stmt->execute();
$result_ilceler = $stmt->get_result();

// İlçeleri JSON formatına dönüştürerek geri döndür
$data = array('ilceler' => array());

if ($result_ilceler->num_rows > 0) {
    while($row = $result_ilceler->fetch_assoc()) {
        $data['ilceler'][] = $row;
    }
}

// JSON formatında verileri döndür
echo json_encode($data);

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
