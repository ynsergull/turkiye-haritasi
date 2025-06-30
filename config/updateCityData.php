<?php

require_once('db_config.php');

// Güncellenmiş veriyi ve il plakasını POST isteği ile al
$updatedData = $_POST['updatedData'];
$plaka = $_POST['plaka'];

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// UPDATE SQL sorgusu oluştur
$sql_update = "UPDATE iller SET il_detay = ? WHERE id = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("si", $updatedData, $plaka);
$stmt->execute();

// Başarılı bir şekilde güncellendiğine dair mesaj gönderebiliriz
echo json_encode(array('success' => true));

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
