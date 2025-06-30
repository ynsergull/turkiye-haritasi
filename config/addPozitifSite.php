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

// Veriyi pozitif_siteler tablosuna ekle
$sql = "INSERT INTO pozitif_siteler (metin) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $veri);

// Aynı verinin zaten ekli olup olmadığını kontrol etmek için bir sorgu yapabilirsiniz
$check_sql = "SELECT * FROM pozitif_siteler WHERE metin = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $veri);
$check_stmt->execute();
$check_result = $check_stmt->get_result();

if ($check_result->num_rows > 0) {
    echo "error"; // Veri zaten mevcut
} else {
    if ($stmt->execute()) {
        echo "success"; // Başarılı yanıtı döndür
    } else {
        echo "error"; // Hata yanıtı döndür
    }
}

// Sorgu sonrası kaynakları serbest bırakalım ve bağlantıyı kapatalım
$stmt->close();
$check_stmt->close();
$conn->close();
?>
