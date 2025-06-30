<?php
// İzin verilen IP adreslerini tanımlayın
$izin_verilen_ip_adresleri = array("123.456.789.012", "192.168.1.145","::1");

// Ziyaretçinin IP adresini alın
$ziyaretci_ip = $_SERVER['REMOTE_ADDR'];

// Ziyaretçinin IP adresini izin verilen IP adresleriyle karşılaştırın
if (!in_array($ziyaretci_ip, $izin_verilen_ip_adresleri)) {
    // Eğer ziyaretçi izin verilen IP adreslerinden birine sahip değilse, erişimi reddedin veya uygun bir mesaj gösterin.
    echo "Üzgünüz, bu sayfaya erişim izniniz bulunmamaktadır.";
    exit; // Sayfanın ger
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <link href="css/svg-turkiye-haritasi.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="col custom-table p-3">
      <h2 class="mt-3 mb-3 text-center">NEGATİF KELİME ARACI</h2>
      <h3 class="mt-3 mb-3 text-center">Admin Paneli</h3>
    </div>

    <div class="row">
      <div class="col p-4 ml-5 mr-5 table-info custom-table">
        <div class="d-flex flex-row">
          <div class="col-4">
            <select class="form-control mb-3 mr-4" id="selectCity">
              <option value="">Şehir Seçiniz</option>
              <option value="1">Adana</option>
              <option value="2">Adıyaman</option>
              <option value="3">Afyonkarahisar</option>
              <option value="4">Ağrı</option>
              <option value="5">Amasya</option>
              <option value="6">Ankara</option>
              <option value="7">Antalya</option>
              <option value="8">Artvin</option>
              <option value="9">Aydın</option>
              <option value="10">Balıkesir</option>
              <option value="11">Bilecik</option>
              <option value="12">Bingöl</option>
              <option value="13">Bitlis</option>
              <option value="14">Bolu</option>
              <option value="15">Burdur</option>
              <option value="16">Bursa</option>
              <option value="17">Çanakkale</option>
              <option value="18">Çankırı</option>
              <option value="19">Çorum</option>
              <option value="20">Denizli</option>
              <option value="21">Diyarbakır</option>
              <option value="22">Edirne</option>
              <option value="23">Elazığ</option>
              <option value="24">Erzincan</option>
              <option value="25">Erzurum</option>
              <option value="26">Eskişehir</option>
              <option value="27">Gaziantep</option>
              <option value="28">Giresun</option>
              <option value="29">Gümüşhane</option>
              <option value="30">Hakkari</option>
              <option value="31">Hatay</option>
              <option value="32">Isparta</option>
              <option value="33">Mersin</option>
              <option value="34">İstanbul</option>
              <option value="35">İzmir</option>
              <option value="36">Kars</option>
              <option value="37">Kastamonu</option>
              <option value="38">Kayseri</option>
              <option value="39">Kırklareli</option>
              <option value="40">Kırşehir</option>
              <option value="41">Kocaeli</option>
              <option value="42">Konya</option>
              <option value="43">Kütahya</option>
              <option value="44">Malatya</option>
              <option value="45">Manisa</option>
              <option value="46">Kahramanmaraş</option>
              <option value="47">Mardin</option>
              <option value="48">Muğla</option>
              <option value="49">Muş</option>
              <option value="50">Nevşehir</option>
              <option value="51">Niğde</option>
              <option value="52">Ordu</option>
              <option value="53">Rize</option>
              <option value="54">Sakarya</option>
              <option value="55">Samsun</option>
              <option value="56">Siirt</option>
              <option value="57">Sinop</option>
              <option value="58">Sivas</option>
              <option value="59">Tekirdağ</option>
              <option value="60">Tokat</option>
              <option value="61">Trabzon</option>
              <option value="62">Tunceli</option>
              <option value="63">Şanlıurfa</option>
              <option value="64">Uşak</option>
              <option value="65">Van</option>
              <option value="66">Yozgat</option>
              <option value="67">Zonguldak</option>
              <option value="68">Aksaray</option>
              <option value="69">Bayburt</option>
              <option value="70">Karaman</option>
              <option value="71">Kırıkkale</option>
              <option value="72">Batman</option>
              <option value="73">Şırnak</option>
              <option value="74">Bartın</option>
              <option value="75">Ardahan</option>
              <option value="76">Iğdır</option>
              <option value="77">Yalova</option>
              <option value="78">Karabük</option>
              <option value="79">Kilis</option>
              <option value="80">Osmaniye</option>
              <option value="81">Düzce</option>
              <option value="82">KKTC</option>
            </select>
            <button type="button" class="btn btn-dark" id="updateCityData">
              Verileri Güncelle
            </button>
          </div>
          <div class="col">
            İller
            <textarea
              class="form-control mt-2 mr-4"
              rows="8"
              id="cityData"
            ></textarea>
          </div>
        </div>
      </div>
      <div class="col p-4 mr-5 table-info custom-table">
        <div class="d-flex flex-row">
          <div class="col-4">
            <select class="form-control mb-3 mr-4" id="selectDistrict">
              <option value="">İlçe Seçiniz</option>
            </select>
            <button type="button" class="btn btn-dark" id="updateDistrictData">
              Verileri Güncelle
            </button>
          </div>
          <div class="col">
            İlçeler
            <textarea
              class="form-control mr-4 mt-2 mb-2"
              rows="8"
              id="districtData"
            ></textarea>
            Semtler
            <textarea
              class="form-control mt-2"
              rows="8"
              id="neighborhoodData"
            ></textarea>
          </div>
        </div>
      </div>
    </div>

    <div class="row m-3">
      <div class="col custom-table table-success col-md-12 col-lg-4">
        <!-- Genel Negatifler Listesine Ekle -->
        <div class="col mt-4">
          <h5>Genel Negatifler Listesine Ekle</h5>
          <textarea
            style="font-size: 12px"
            id="genelNegatifEkleTextarea"
            class="form-control"
            rows="1"
            placeholder="Genel Negatifler Listesine Ekle"
          ></textarea>
          <button
            type="button"
            id="addGenelNegatifBtn"
            class="btn btn-dark mt-2"
          >
            Ekle
          </button>
        </div>
        <!-- Genel Negatifler Listesinden Sil -->
        <div class="col mt-4">
          <h5>Genel Negatifler Listesinden Sil</h5>
          <textarea
            style="font-size: 12px"
            id="genelNegatifSilTextarea"
            class="form-control"
            rows="1"
            placeholder="Genel Negatifler Listesinden Sil"
          ></textarea>
          <button
            type="button"
            id="deleteGenelNegatifBtn"
            class="btn btn-dark mt-2 mb-4"
          >
            Sil
          </button>
        </div>
      </div>
      <div class="col custom-table table-success col-md-12 col-lg-4">
        <!-- Negatif Siteler Listesine Ekle -->
        <div class="col mt-4">
          <h5>Negatif Siteler Listesine Ekle</h5>
          <textarea
            style="font-size: 12px"
            id="negatifEkleTextarea"
            class="form-control"
            rows="1"
            placeholder="Negatif Siteler Listesine Ekle"
          ></textarea>
          <button
            type="button"
            id="addNegatifSiteBtn"
            class="btn btn-dark mt-2"
          >
            Ekle
          </button>
        </div>
        <!-- Negatif Siteler Listesinden Sil -->
        <div class="col mt-4">
          <h5>Negatif Siteler Listesinden Sil</h5>
          <textarea
            style="font-size: 12px"
            id="negatifSilTextarea"
            class="form-control"
            rows="1"
            placeholder="Negatif Siteler Listesinden Sil"
          ></textarea>
          <button
            type="button"
            id="deleteNegatifSiteBtn"
            class="btn btn-dark mt-2"
          >
            Sil
          </button>
        </div>
      </div>
      <div class="col custom-table table-success col-md-12 col-lg-4">
        <!-- Pozitif Siteler Listesine Ekle -->
        <div class="col mt-4">
          <h5>Pozitif Siteler Listesine Ekle</h5>
          <textarea
            style="font-size: 12px"
            id="pozitifEkleTextarea"
            class="form-control"
            rows="1"
            placeholder="Pozitif Siteler Listesine Ekle"
          ></textarea>
          <button
            type="button"
            id="addPozitifSiteBtn"
            class="btn btn-dark mt-2"
          >
            Ekle
          </button>
        </div>
        <!-- Pozitif Siteler Listesinden Sil -->
        <div class="col mt-4">
          <h5>Pozitif Siteler Listesinden Sil</h5>
          <textarea
            style="font-size: 12px"
            id="pozitifSilTextarea"
            class="form-control"
            rows="1"
            placeholder="Pozitif Siteler Listesinden Sil"
          ></textarea>
          <button
            type="button"
            id="deletePozitifSiteBtn"
            class="btn btn-dark mt-2 mb-3"
          >
            Sil
          </button>
        </div>  
      </div>
    <script src="js/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#selectCity").change(function () {
          var plaka = $(this).val();
          // AJAX isteği ile il detaylarını al
          $.ajax({
            url: "config/getCityData.php",
            type: "POST",
            dataType: "json",
            data: { plaka: plaka },
            success: function (response) {
              // İl detaylarını textarea içine yerleştir
              $("#cityData").val(response.il_detay);
            },
            error: function (xhr, status, error) {
              console.error(error);
            },
          });
        });
        $("#selectCity").change(function () {
          var plaka = $(this).val();
      
          // AJAX isteği ile ilçeleri al
          $.ajax({
            url: "config/getDistricts.php",
            type: "POST",
            dataType: "json",
            data: { plaka: plaka },
            success: function (response) {
              // İlçeler dropdown listesine ekle
              $("#selectDistrict").empty(); // Önceki ilçe listesini temizle
              $.each(response.ilceler, function (index, ilce) {
                $("#selectDistrict").append(
                  '<option value="' +
                    ilce.ilce_adi +
                    '">' +
                    ilce.ilce_adi_tr +
                    "</option>"
                );
              });
      
              // İlçeler listesi doldurulduktan sonra "İlçe Seçiniz" seçeneğini ekle
              $("#selectDistrict").prepend(
                '<option value="" selected>İlçe Seçiniz</option>'
              );
      
              // İl değiştirildiğinde ilçe detaylarını temizle
              $("#districtData").val("");
            },
            error: function (xhr, status, error) {
              console.error(error);
            },
          });
        });
        // Verileri güncelle butonuna tıklandığında
        $("#updateCityData").click(function () {
          // Güncellenen verileri al
          var updatedData = $("#cityData").val();

          // Verileri virgül veya boşlukla ayır
          var words = updatedData.split(/[,\s]+/);

          // Her kelimenin başındaki ve sonundaki boşlukları temizle
          var cleanedWords = words.map(function(word) {
              return word.trim();
          });

          // Boşluklu kelimeleri virgülle değiştir
          var cleanedData = cleanedWords.join(',');

          // Eğer en sonda fazladan virgül varsa sil
          cleanedData = cleanedData.replace(/,+$/, '');

          // Eğer virgül ve boşlukla ayrılmış veri varsa, bunları ayırıp virgülle birleştir
          cleanedData = cleanedData.replace(/,\s+/g, ',');

          var plaka = $("#selectCity").val(); // Seçilen şehrin plakasını al
      
          // AJAX isteği ile güncellenen verileri ve plakayı gönder
          $.ajax({
            url: "config/updateCityData.php",
            type: "POST",
            dataType: "json",
            data: {
              updatedData: cleanedData,
              plaka: plaka,
            },
            success: function (response) {
              // Başarılı bir şekilde güncellendiğine dair mesaj gösterilebilir veya başka bir işlem yapılabilir
              alert("Veriler başarıyla güncellendi!");
            },
            error: function (xhr, status, error) {
              console.error(error);
              alert("Bir hata oluştu, veriler güncellenemedi.");
            },
          });
        });
        $("#selectDistrict").change(function () {
          var selectedDistrict = $(this).val();
      
          // AJAX isteği ile ilçe detaylarını al
          $.ajax({
            url: "config/getDistrictDetail.php",
            type: "POST",
            dataType: "json",
            data: { selectedDistrict: selectedDistrict },
            success: function (response) {
              // Ilçe detaylarını textarea içine yerleştir
              $("#districtData").val(response.ilce_detay);
      
              // Semtler verisini textarea içine yerleştir
              $("#neighborhoodData").val(response.semtler);
            },
            error: function (xhr, status, error) {
              console.error(error);
            },
          });
        });
        $("#updateDistrictData").click(function () {
          var updatedDistrictData = $("#districtData").val(); // Güncellenen ilçe detayları
          // Verileri virgül veya boşlukla ayır
          var words = updatedDistrictData.split(/[,\s]+/);
          // Her kelimenin başındaki ve sonundaki boşlukları temizle
          var cleanedWords = words.map(function(word) {
              return word.trim();
          });
          // Boşluklu kelimeleri virgülle değiştir
          var cleanedDistrictData = cleanedWords.join(',');
          // Eğer en sonda fazladan virgül varsa sil
          cleanedDistrictData = cleanedDistrictData.replace(/,+$/, '');
          // Eğer virgül ve boşlukla ayrılmış veri varsa, bunları ayırıp virgülle birleştir
          cleanedDistrictData = cleanedDistrictData.replace(/,\s+/g, ',');

          var updatedNeighborhoodData = $("#neighborhoodData").val(); // Güncellenen semtler
          // Verileri virgül veya boşlukla ayır
          var words = updatedNeighborhoodData.split(/[,\s]+/);
          // Her kelimenin başındaki ve sonundaki boşlukları temizle
          var cleanedWords = words.map(function(word) {
              return word.trim();
          });
          // Boşluklu kelimeleri virgülle değiştir
          var cleanedNeighborhoodData = cleanedWords.join(',');
          // Eğer en sonda fazladan virgül varsa sil
          cleanedNeighborhoodData = cleanedNeighborhoodData.replace(/,+$/, '');
          // Eğer virgül ve boşlukla ayrılmış veri varsa, bunları ayırıp virgülle birleştir
          cleanedNeighborhoodData = cleanedNeighborhoodData.replace(/,\s+/g, ',');

          var selectedDistrict = $("#selectDistrict").val(); // Seçilen ilçenin adı
      
          // AJAX isteği ile güncellenen verileri ve seçilen ilçenin adını gönder
          $.ajax({
            url: "config/updateDistrictData.php",
            type: "POST",
            dataType: "json",
            data: {
              updatedDistrictData: cleanedDistrictData,
              updatedNeighborhoodData: cleanedNeighborhoodData,
              selectedDistrict: selectedDistrict,
            },
            success: function (response) {
              // Başarılı bir şekilde güncellendiğine dair mesaj gösterilebilir veya başka bir işlem yapılabilir
              alert("Veriler başarıyla güncellendi!");
            },
            error: function (xhr, status, error) {
              console.error(error);
              alert("Bir hata oluştu, veriler güncellenemedi.");
            },
          });
        });
        $('#addGenelNegatifBtn').click(function() {
          // textarea'dan veriyi al
          var veri = $('#genelNegatifEkleTextarea').val().trim();
      
          // Verinin boş olup olmadığını kontrol et
          if (veri !== "") {
              // AJAX isteği yap
              $.ajax({
                  type: "POST",
                  url: "config/addGenelNegatif.php",
                  contentType: "application/json", // JSON verisi gönderiyoruz
                  data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                  success: function(response) {
                      alert("Veri başarıyla eklendi.");
                  },
                  error: function(xhr, status, error) {
                      // Hata durumunu işle
                      console.error(xhr.responseText);
                  }
              });
          } else {
              // Veri boşsa kullanıcıyı uyar
              alert("Veri girmelisiniz.");
          }
      });
      $('#deleteGenelNegatifBtn').click(function() {
        // textarea'dan veriyi al
        var veri = $('#genelNegatifSilTextarea').val().trim();
      
        // Verinin boş olup olmadığını kontrol et
        if (veri !== "") {
            // AJAX isteği yap
            $.ajax({
                type: "POST",
                url: "config/deleteGenelNegatif.php",
                contentType: "application/json", // JSON verisi gönderiyoruz
                data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                success: function(response) {
                    // Başarılı yanıtı işle
                    if (response === "success") {
                        alert("Veri başarıyla silindi.");
                    } else {
                        alert("Belirtilen veri veritabanında bulunamadı veya silinemedi.");
                    }
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Hata durumunu işle
                    console.error(xhr.responseText);
                }
            });
        } else {
            // Veri boşsa kullanıcıyı uyar
            alert("Veri girmelisiniz.");
        }
      });
      $('#addNegatifSiteBtn').click(function() {
        // textarea'dan veriyi al
        var veri = $('#negatifEkleTextarea').val().trim();
      
        // Verinin boş olup olmadığını kontrol et
        if (veri !== "") {
            // AJAX isteği yap
            $.ajax({
                type: "POST",
                url: "config/addNegatifSite.php",
                contentType: "application/json", // JSON verisi gönderiyoruz
                data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                success: function(response) {
                    alert("Veri başarıyla eklendi.");
                },
                error: function(xhr, status, error) {
                    // Hata durumunu işle
                    console.error(xhr.responseText);
                }
            });
        } else {
            // Veri boşsa kullanıcıyı uyar
            alert("Veri girmelisiniz.");
        }
      });
      $('#deleteNegatifSiteBtn').click(function() {
        // textarea'dan veriyi al
        var veri = $('#negatifSilTextarea').val().trim();
      
        // Verinin boş olup olmadığını kontrol et
        if (veri !== "") {
            // AJAX isteği yap
            $.ajax({
                type: "POST",
                url: "config/deleteNegatifSite.php",
                contentType: "application/json", // JSON verisi gönderiyoruz
                data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                success: function(response) {
                    if (response === "success") {
                        alert("Veri başarıyla silindi.");
                    } else {
                        alert("Belirtilen veri veritabanında bulunamadı veya silinemedi.");
                    }
                },
                error: function(xhr, status, error) {
                    // Hata durumunu işle
                    console.error(xhr.responseText);
                }
            });
        } else {
            // Veri boşsa kullanıcıyı uyar
            alert("Veri girmelisiniz.");
        }
      });
      $('#addPozitifSiteBtn').click(function() {
        // textarea'dan veriyi al
        var veri = $('#pozitifEkleTextarea').val().trim();
      
        // Verinin boş olup olmadığını kontrol et
        if (veri !== "") {
            // AJAX isteği yap
            $.ajax({
                type: "POST",
                url: "config/addPozitifSite.php",
                contentType: "application/json", // JSON verisi gönderiyoruz
                data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                success: function(response) {
                    if (response === "success") {
                        alert("Veri başarıyla eklendi.");
                    } else {
                        alert("Veri zaten mevcut veya eklenemedi.");
                    }
                },
                error: function(xhr, status, error) {
                    // Hata durumunu işle
                    console.error(xhr.responseText);
                }
            });
        } else {
            // Veri boşsa kullanıcıyı uyar
            alert("Veri girmelisiniz.");
        }
      });
      $('#deletePozitifSiteBtn').click(function() {
        // textarea'dan veriyi al
        var veri = $('#pozitifSilTextarea').val().trim();
      
        // Verinin boş olup olmadığını kontrol et
        if (veri !== "") {
            // AJAX isteği yap
            $.ajax({
                type: "POST",
                url: "config/deletePozitifSite.php",
                contentType: "application/json", // JSON verisi gönderiyoruz
                data: JSON.stringify({ veri: veri }), // JSON formatına dönüştürüyoruz
                success: function(response) {
                    if (response === "success") {
                        alert("Veri başarıyla silindi.");
                    } else {
                        alert("Belirtilen veri veritabanında bulunamadı veya silinemedi.");
                    }
                },
                error: function(xhr, status, error) {
                    // Hata durumunu işle
                    console.error(xhr.responseText);
                }
            });
        } else {
            // Veri boşsa kullanıcıyı uyar
            alert("Veri girmelisiniz.");
        }
      });
      
      
      });
    </script>
  </body>
</html>
