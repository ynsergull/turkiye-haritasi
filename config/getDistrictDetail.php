<?php

require_once('db_config.php');

// Seçilen ilçenin adını POST isteği ile al
$selectedDistrict = $_POST['selectedDistrict'];

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// İlçe detaylarını ve semtler verisini çek
$sql_ilce_detay = "SELECT ilce_detay, semtler FROM ilceler WHERE ilce_adi = ?";
$stmt = $conn->prepare($sql_ilce_detay);
$stmt->bind_param("s", $selectedDistrict);
$stmt->execute();
$result_ilce_detay = $stmt->get_result();

// İlçe detayları ve semtler verisini JSON formatına dönüştürerek geri döndür
$data = array();

if ($result_ilce_detay->num_rows > 0) {
    $row = $result_ilce_detay->fetch_assoc();
    $data['ilce_detay'] = $row['ilce_detay'];
    $data['semtler'] = $row['semtler'];
}

// JSON formatında verileri döndür
echo json_encode($data);

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
