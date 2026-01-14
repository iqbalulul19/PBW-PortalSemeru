<?php 
//memulai session atau melanjutkan session yang sudah ada
session_start(); 

include 'koneksi.php';

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) { 
	header("location:login.php"); 
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semeru Nature Portal | Admin</title>
    <link rel="icon" href="img/icon.png"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    #content {
        flex: 1;
    }
	footer {
        background-color: #97a87a;
        color: #ffffff;
        padding: 20px 0;
        transition: 0.3s;
    }
	.navbar-toggler-icon {
      filter: invert(100%) brightness(200%);
    }
    .navbar-toggler {
      box-shadow: none !important;
      outline: none !important;
      border: none !important;
    }
	.border-custom {
		border-color: #8BAE66 !important;
	}
	body {
		background-color: #dfecc8;
	}
	.dropdown-toggle {
    color: #4C763B !important;
	}
	.dropdown-toggle:hover,
	.dropdown-toggle:focus,
	.dropdown-toggle:active,
	.dropdown-toggle.show {
	    color: #2F4F2F !important;
	    background-color: transparent !important;
	    box-shadow: none !important;
	}
</style>
  </head>
  <body>
	<!-- nav begin -->
    <nav class="navbar navbar-expand-lg shadow-md sticky-top" style="background-color: #97a87a">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center text-light" href="#"><img src="img/icon.png" alt="icon" width="50" height="50" class="me-2" />BINGKAI SEMERU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
				<a class="nav-link text-light" href="admin.php?page=dashboard">Dashboard</a>
			</li>
			<li class="nav-item">
			    <a class="nav-link text-light" href="admin.php?page=article">Article</a>
			</li>
            <li class="nav-item">
			    <a class="nav-link text-light" href="admin.php?page=gallery">Gallery</a>
			</li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username']?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="admin.php?page=profile">Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                </ul>
            </li> 
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav end -->
	<!-- content begin -->
    <section id="content" class="p-5">
        <div class="container">
			<?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = "dashboard";
            }

            echo '<h4 class="lead display-6 pb-2 border-bottom border-custom">' . $page . '</h4>';
            include($page . ".php");
            ?>
        </div> 
    </section>
    <!-- content end -->
	<!-- footer begin -->
    <footer class="text-center p-3">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>