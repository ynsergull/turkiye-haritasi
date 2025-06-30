<?php

require_once('db_config.php');

header('Content-Type: text/html; charset=utf-8');


// Veritabanı bağlantısını oluşturalım
$conn = new mysqli($host, $username, $password, $database);
$conn->set_charset("utf8");

// Bağlantı hatası kontrolü
if ($conn->connect_error) {
    die("Veritabanı bağlantı hatası: " . $conn->connect_error);
}



// POST isteğinden ilçe isimlerini al
$ilceler = json_decode(file_get_contents("php://input"), true);

$flattenedArray = array();
foreach ($ilceler['ilceler'] as $ilce) {
    $flattenedArray[] = $ilce;
}

$ilceListesi = "'" . implode("','", $flattenedArray) . "'";



// Seçili ilçelerin detaylarını almak için SQL sorgusu
$sqlPositif = "SELECT ilceler.ilce_detay, ilceler.semtler, iller.il_detay
        FROM ilceler 
        INNER JOIN iller ON ilceler.il_id = iller.id 
        WHERE ilceler.ilce_adi IN ($ilceListesi)";

// Negatif il ve ilçeleri almak için SQL sorgusu
$sqlNegatif = "SELECT ilceler.ilce_detay, ilceler.semtler, iller.il_detay
        FROM ilceler 
        INNER JOIN iller ON ilceler.il_id = iller.id 
        WHERE ilceler.ilce_adi NOT IN ($ilceListesi)";

// Sonuçları bir dizi olarak sakla
$ilceDetaylari = array();

// Seçili ilçelerin detaylarını al
$resultPositif = $conn->query($sqlPositif);

if ($resultPositif->num_rows > 0) {
    while ($row = $resultPositif->fetch_assoc()) {
        $ilceDetaylari['pozitif'][] = array(
            'ilce_detay' => $row['ilce_detay'],
            'semtler' => $row['semtler'],
            'il_detay' => $row['il_detay']
        );
    }
}

// Negatif il ve ilçeleri al
$resultNegatif = $conn->query($sqlNegatif);

if ($resultNegatif->num_rows > 0) {
    while ($row = $resultNegatif->fetch_assoc()) {
        $ilceDetaylari['negatif'][] = array(
            'ilce_detay' => $row['ilce_detay'],
            'semtler' => $row['semtler'],
            'il_detay' => $row['il_detay']
        );
    }
}


//var_dump($ilceDetaylari);
// Sonuçları JSON formatında geri döndür
echo json_encode($ilceDetaylari);

// Bağlantıyı kapat
$conn->close();
?>
