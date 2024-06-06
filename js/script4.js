// Ambil elemen yang dibutuhkan
var keyword = document.getElementById("keyword");
var container = document.getElementById("container");

// Tambah event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // Buat object ajax
  var xhr = new XMLHttpRequest();

  // Cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      // Parse respons JSON
      var response = JSON.parse(xhr.responseText);

      // Ubah konten container dengan informasi sekolah
      container.innerHTML = `
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="img/${response.gambar}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">${response.nama}</h5>
                        <p class="card-text">${response.alamat}</p>
                        <p class="card-text">${response.akreditasi}</p>
                        <p class="card-text"><a href="${response.instagram}" class="card-link">Instagram</a></p>
                    </div>
                </div>
            </div>
        </div>
      `;
    }
  };

  // Eksekusi ajax
  xhr.open("GET", "ajax/sm.php?keyword=" + keyword.value, true);
  xhr.send();
});
