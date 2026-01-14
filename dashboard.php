<style>
    .card-body{
        border: 2px solid #6b8e23;
        border-radius: 5px;
    }
    .badge{
        background-color: #6b8e23;
    }
</style>

<?php
include "koneksi.php";

// Ambil username dari session
$username = $_SESSION['username'];

// Ambil data user berdasarkan username
$q_user = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$user = mysqli_fetch_assoc($q_user);

// Jika user punya foto, ambil dari folder
$foto = "img/" . ($user['foto'] != "" ? $user['foto'] : "default.png");
?>

<?php
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

$jumlah_article = $hasil1->num_rows; 
 
$sql2 = "SELECT * FROM gallery ORDER BY tanggal DESC";
$hasil2 = $conn->query($sql2);

$jumlah_gallery = $hasil2->num_rows;
?>

<div class="text-center mb-4">
    <h4 class="fw-semibold">Selamat Datang,</h4>
    <h2 class="fw-bold" style="color: #6b8e23;"><?= $user['username'] ?></h2>

    <img src="<?= $foto ?>" width="200" height="200" 
         class="rounded-circle shadow" alt="profile" style="object-fit: cover;">
</div>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <div class="col">
        <div class="card mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-newspaper"></i> Article</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill  fs-2"><?php echo $jumlah_article; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
    <div class="col">
        <div class="card mb-3 shadow" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title"><i class="bi bi-camera"></i> Gallery</h5> 
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill fs-2"><?php echo $jumlah_gallery; ?></span>
                    </div> 
                </div>
            </div>
        </div>
    </div> 
</div>
