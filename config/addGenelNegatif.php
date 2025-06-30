<?php
// Veritabanı bağlantısı için gerekli bilgileri içeren dosyayı dahil et
require_once('db_config.php');

// POST isteğiyle gelen veriyi al
$data = json_decode(file_get_contents("php://input"), true);
$veri = $data['veri'];

// Veritabanına bağlanma
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Veriyi genel_negatifler tablosuna ekle
$sql = "INSERT INTO genel_negatifler (metin) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $veri);

if ($stmt->execute()) {
    echo "Veri başarıyla eklendi.";
} else {
    echo "Veri eklenirken hata oluştu: " . $conn->error;
}

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
