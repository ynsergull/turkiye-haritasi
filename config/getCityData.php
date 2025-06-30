<?php

require_once('db_config.php');

// POST isteği ile gelen seçilen il plaka numarasını al
$selectedPlaka = $_POST['plaka']; 

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Seçilen ilin detaylarını çek
$sql_il_detay = "SELECT il_detay FROM iller WHERE id = ?";
$stmt = $conn->prepare($sql_il_detay);
$stmt->bind_param("i", $selectedPlaka);
$stmt->execute();
$stmt->bind_result($il_detay);
$stmt->fetch();

// İl detaylarını JSON formatında döndür
$response = array(
    'il_detay' => $il_detay
);
echo json_encode($response);

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
