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

// Genel negatifleri çek
$sql = "SELECT metin FROM genel_negatifler";
$result = $conn->query($sql);

// Genel negatifleri bir diziye yerleştir
$genelNegatifler = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $genelNegatifler[] = $row["metin"];
    }
}


// Genel negatifleri JSON formatında döndür
echo json_encode($genelNegatifler);
// Veritabanı bağlantısını kapatma
$conn->close();


?>
