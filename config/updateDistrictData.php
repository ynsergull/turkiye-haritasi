<?php

require_once('db_config.php');

// Güncellenecek ilçenin adını, ilçe detaylarını ve semtleri POST isteği ile al
$selectedDistrict = $_POST['selectedDistrict'];
$updatedDistrictData = $_POST['updatedDistrictData'];
$updatedNeighborhoodData = $_POST['updatedNeighborhoodData'];

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// İlçe detaylarını ve semtleri güncelle
$sql_update = "UPDATE ilceler SET ilce_detay = ?, semtler = ? WHERE ilce_adi = ?";
$stmt = $conn->prepare($sql_update);
$stmt->bind_param("sss", $updatedDistrictData, $updatedNeighborhoodData, $selectedDistrict);
$stmt->execute();

// Başarılı bir şekilde güncellendiğine dair mesaj gönder
$response = array('message' => 'İlçe detayları ve semtler başarıyla güncellendi!');
echo json_encode($response);

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
