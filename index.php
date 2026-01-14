<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Semeru Nature Portal | Artikel & Galeri Gunung Semeru"/>
    <title>Semeru Nature Portal</title>
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"/>
    <style>
      html {
        scroll-behavior: smooth;
      }
      body {
        background-color: #ffffff;
        color: #222222;
        transition: background 0.3s, color 0.3s;
      }
      section {
        background-color: #dfecc8;
        transition: 0.3s;
        scroll-margin-top: 60px;
      }
      .nav-divider {
        margin-right: 7px;
        width: 1.5px;
        height: 100%;
        background-color: #cfcfcf;
        border-radius: 20px;
      }
      .dark-mode .nav-divider {
        background-color: #555;
      }
      .img-fluid {
        border-radius: 10px;
      }
      .card-img-top {
        height: 200px;
        object-fit: cover;
      }
      .gallery-img {
        height: 500px; 
        width: 30rem; 
        object-fit: cover;     
        border-radius: 10px;    
      }
      @media (max-width: 768px) {
        .gallery-img {
          height: 300px;       
        }
        .nav-divider {
          width: 100%;       
          height: 1.5px;    
          margin: 12px 0;    
        }
        .darkmode-btn{
        margin-top: 10px;
        }
      }
      @media (max-width: 480px) {
        .gallery-img {
          height: 200px;
        }
        .nav-divider {
          width: 100%;
          height: 1.5px;
          margin: 12px 0;
          opacity: 0.8;
        }
        .darkmode-btn{
          margin-top: 12px;
        }
      }
      .navbar-toggler-icon {
        filter: invert(100%) brightness(200%);
      }
      .navbar-toggler {
        box-shadow: none !important;
        outline: none !important;
        border: none !important;
      }
      #scroll {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 99;
        background-color: #97a87a;
        color: white;
        border: none;
        outline: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        font-size: 22px;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
      }
      #scroll:hover {
        transform: scale(1.05);
      }
      body.dark-mode #scroll:hover {
        background-color: #858484 !important;
      }
      .current-datetime {
        font-size: 18px;
        margin-top: 10px;
        font-weight: 500;
      }
      footer {
        background-color: #97a87a;
        color: #ffffff;
        padding: 20px 0;
        transition: 0.3s;
      }
      .card .lastUpdate {
        color: #4b4b4b;
        font-size: 14px;
        transition: 0.3s;
      }

      /*Dark Mode*/
      body.dark-mode {
        background-color: #1b1b1b;
        color: #eaeaea;
      }
      body.dark-mode section {
        background-color: #2a2a2a !important;
      }
      body.dark-mode .card {
        background-color: #5f5e5e;
        color: #eaeaea;
      }
      body.dark-mode .navbar {
        background-color: #000000 !important;
      }
      body.dark-mode .nav-link,
      body.dark-mode .navbar-brand {
        color: #ffffff !important;
      }
      body.dark-mode footer {
        background-color: #000000;
        color: #eaeaea;
      }
      body.dark-mode #scroll {
        background-color: #858484 !important;
        color: #eaeaea !important;
        box-shadow: 0 0 8px #00000055;
      }
      body.dark-mode .lastUpdate{
        color: #dcdcdc !important;
      }
      .darkmode-btn {
        background: transparent;
        border: 2px solid #fff;
        color: #fff;
        padding: 1px 10px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        transition: 0.3s;
        width: 95px;        
        height: 40px;    
      }
      .darkmode-btn:hover {
        background: rgba(255, 255, 255, 0.2);
      }
      body.dark-mode .darkmode-btn {
        border-color: #eaeaea;
        color: #eaeaea;
      }
      body.dark-mode #hero {
        background-color: #2a2a2a !important;
        color: #fff;
      }
      
    </style>
  </head>
  <body>
    <button id="scroll"><i class="bi bi-arrow-up"></i></button>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-lg shadow-md sticky-top" style="background-color: #97a87a">
      <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center text-light" href="#"><img src="img/icon.png" alt="icon" width="50" height="50" class="me-2" />BINGKAI SEMERU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-light active" aria-current="page" href="#hero" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#article">Article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="login.php" target="_blank">Login</a>
            </li>
            <li class="nav-item"><div class="nav-divider"></div></li>
            <li class="nav-item"><button id="darkMode" class="darkmode-btn">
              <span class="theme-icon">🌙 Dark</span>
            </button>
          </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- nav end -->

    <!-- hero begin -->
    <section id="hero" class="text-center p-5 text-sm-start" style="background-color: #dfecc8">
      <div class="container">
        <div class="d-sm-flex flex-sm-row-reverse align-items-center">
          <img src="img/banner.jpg" class="img-fluid" width="300" alt="banner"/>
          <div class="text-hero">
            <h1 class="fw-bold display-4">Semeru: Jejak di Atas Awan</h1>
            <h4 class="lead display-6">
              Jelajahi Keindahan, Taklukkan Puncak, dan Rasakan Harmoni Alam di
              Kawasan Pendakian Gunung Semeru!
            </h4>
            <div class="current-datetime">
            <span id="Hari"></span>,
            <span id="Tanggal"></span> —
            <span id="Jam"></span>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!-- hero end -->

    <!-- article begin -->
    <section id="article" class="text-center p-5" style="background-color: #dfecc8">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql);

          while ($row = $hasil->fetch_assoc()) {
          ?>
          <!-- col begin -->
          <div class="col">
            <div class="card h-100">
              <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="Ranukumbolo"/>
              <div class="card-body">
                <h5 class="card-title"><?= $row["judul"]?></h5>
                <p class="card-text" style="text-align: justify">
                  <?= $row["isi"]?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-body-secondary"><?= $row["tanggal"]?></small>
              </div>
            </div>
          </div>
          <!-- col end -->
          <?php
          }
          ?>
        </div>
      </div>
    </section>
    <!-- article end -->

    <!-- gallery begin -->
    <section id="gallery" class="text-center p-5" style="background-color: #dfecc8;">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">Gallery</h1>
        <?php
        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);
        $gallery = [];
        if ($hasil) {
          while ($row = $hasil->fetch_assoc()) {
            $gallery[] = $row;
          }
        }

        if (count($gallery) > 0) {
        ?>
        <div id="carouselExample" class="carousel slide">
          <?php if (count($gallery) > 1) { ?>
          <div class="carousel-indicators">
            <?php foreach ($gallery as $i => $g) { ?>
              <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>" aria-current="<?= $i === 0 ? 'true' : 'false' ?>" aria-label="Slide <?= $i+1 ?>"></button>
            <?php } ?>
          </div>
          <?php } ?>

          <div class="carousel-inner">
            <?php foreach ($gallery as $i => $g) { ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
              <img src="img/<?= htmlspecialchars($g['gambar']) ?>" class="d-block w-100 gallery-img" alt="<?= htmlspecialchars($g['deskripsi']) ?>"/>
            </div>
            <?php } ?>
          </div>

          <?php if (count($gallery) > 1) { ?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          <?php } ?>
        </div>
        <?php
        } else {
          echo '<p class="text-muted">Belum ada gambar gallery.</p>';
        }
        ?>
      </div>
    </section>
    <!-- gallery end -->

    <!-- footer begin -->
    <footer class="text-center p-5">
      <div>
        <a href="https://www.instagram.com/iqblulul?igsh=MTR1NGlyMTN4MWsydw=="><i class="bi bi-instagram h2 p-2 text-light"></i></a>
        <a href="#"><i class="bi bi-twitter h2 p-2 text-light"></i></a>
        <a href="https://github.com/iqbalulul19"><i class="bi bi-github h2 p-2 text-light"></i></a>
      </div>
      <div>
        <p class="text-light mt-3">
          &copy; 2025 Iqbal Ulul Albab. All rights reserved.
        </p>
      </div>
    </footer>
    <!-- footer end -->

    <script type="text/javascript">
    // Scroll to Top
    let scrollBtn = document.getElementById("scroll");

      window.onscroll = function () {
      if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollBtn.style.display = "flex";
        } else {
        scrollBtn.style.display = "none";
      }
     };

      scrollBtn.addEventListener("click", function () {
        window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    });
    
    // Waktu Sekarang
      function WaktuSekarang() {
        const arrHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        const arrBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        const waktu = new Date();

        const hari = arrHari[waktu.getDay()];
        const tanggal = waktu.getDate();
        const bulan = arrBulan[waktu.getMonth()];
        const tahun = waktu.getFullYear();

        const jam = waktu.getHours().toString().padStart(2, "0");
        const menit = waktu.getMinutes().toString().padStart(2, "0");
        const detik = waktu.getSeconds().toString().padStart(2, "0");

        document.getElementById("Hari").innerHTML = hari;
        document.getElementById("Tanggal").innerHTML = tanggal + " " + bulan + " " + tahun;
        document.getElementById("Jam").innerHTML = jam + ":" + menit + ":" + detik;
      }

      setInterval(WaktuSekarang, 1000);
      updateDateTime();
    </script>
    <script>
    // Dark Mode
    const toggleBtn = document.getElementById("darkMode");
      const icon = document.querySelector(".darkmode-btn");

      toggleBtn.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
      
        if (document.body.classList.contains("dark-mode")) {
          icon.textContent = "☀ Light";   
        } else {
          icon.textContent = "🌙 Dark";  
        }
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
