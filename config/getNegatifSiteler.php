<?php
// Veritabanı bağlantısı için gerekli bilgileri içeren dosyayı dahil et
require_once('db_config.php');

// Veritabanına bağlanma
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}

// Negatif siteleri çek
$sql = "SELECT metin FROM negatif_siteler";
$result = $conn->query($sql);

// Negatif siteleri bir diziye yerleştir
$negatifSiteler = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $negatifSiteler[] = $row["metin"];
    }
}

// Veritabanı bağlantısını kapatma
$conn->close();

// Negatif siteleri JSON formatında döndür
echo json_encode($negatifSiteler);
?>
