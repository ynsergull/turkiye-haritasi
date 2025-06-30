function getGenelNegatifler() {
    // AJAX isteği yap
    const xhr = new XMLHttpRequest();
    const url = "config/getGenelNegatifler.php"; // PHP betiği
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      try {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const genelNegatifler = JSON.parse(xhr.responseText);
  
          // Genel negatiflerin textarea içine yerleştirilmesi
          const genelNegatiflerTextarea = document.getElementById("genelNegatiflerTextarea");
          genelNegatiflerTextarea.value = genelNegatifler.join("\n");
        }
      } catch (error) {
        console.error("Hata oluştu:", error);
        console.error("xhr durumu:", xhr.readyState);
        console.error("xhr durumu:", xhr.status);
      }
    };
    xhr.send();
  }
  function getNegatifSiteler() {
    // AJAX isteği yap
    const xhr = new XMLHttpRequest();
    const url = "config/getNegatifSiteler.php";
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      try {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const negatifSiteler = JSON.parse(xhr.responseText);
  
          // Negatif sitelerin textarea içine yerleştirilmesi
          const negatifSitelerTextarea = document.getElementById("negatiflerTextarea");
          negatifSitelerTextarea.value = negatifSiteler.join("\n");
        }
      } catch (error) {
        console.error("Hata oluştu:", error);
        console.error("xhr durumu:", xhr.readyState);
        console.error("xhr durumu:", xhr.status);
      }
    };
    xhr.send();
  }
  function getPozitifSiteler() {
    // AJAX isteği yap
    const xhr = new XMLHttpRequest();
    const url = "config/getPozitifSiteler.php";
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
      try {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const pozitifSiteler = JSON.parse(xhr.responseText);
  
          // Pozitif sitelerin textarea içine yerleştirilmesi
          const pozitifSitelerTextarea = document.getElementById("poztiflerTextarea");
          pozitifSitelerTextarea.value = pozitifSiteler.join("\n");
        }
      } catch (error) {
        console.error("Hata oluştu:", error);
        console.error("xhr durumu:", xhr.readyState);
        console.error("xhr durumu:", xhr.status);
      }
    };
    xhr.send();
  }
  
  

  getGenelNegatifler();
  getNegatifSiteler();
  getPozitifSiteler();