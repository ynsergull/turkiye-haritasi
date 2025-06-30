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
    var updatedData = $("#cityData").val(); // Güncellenen verileri al
    var plaka = $("#selectCity").val(); // Seçilen şehrin plakasını al

    // AJAX isteği ile güncellenen verileri ve plakayı gönder
    $.ajax({
      url: "config/updateCityData.php",
      type: "POST",
      dataType: "json",
      data: {
        updatedData: updatedData,
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
    var updatedNeighborhoodData = $("#neighborhoodData").val(); // Güncellenen semtler
    var selectedDistrict = $("#selectDistrict").val(); // Seçilen ilçenin adı

    // AJAX isteği ile güncellenen verileri ve seçilen ilçenin adını gönder
    $.ajax({
      url: "config/updateDistrictData.php",
      type: "POST",
      dataType: "json",
      data: {
        updatedDistrictData: updatedDistrictData,
        updatedNeighborhoodData: updatedNeighborhoodData,
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