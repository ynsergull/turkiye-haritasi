<?php

require_once('db_config.php');

// POST isteğiyle gelen veriyi al
$data = json_decode(file_get_contents("php://input"), true);
$veri = $data['veri'];

// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Veriyi genel_negatifler tablosundan sil
$sql = "DELETE FROM genel_negatifler WHERE metin = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $veri);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "success"; // Başarılı işlem durumu
    } else {
        echo "failure"; // Veri bulunamadı veya silinemedi
    }
} else {
    echo "failure"; // Başarısız işlem durumu
}

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
