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
$sql = "INSERT INTO negatif_siteler (metin) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $veri);

if ($stmt->execute()) {
    echo "success"; // Başarılı yanıtı döndür
} else {
    echo "error"; // Hata yanıtı döndür
}

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$conn->close();
?>
