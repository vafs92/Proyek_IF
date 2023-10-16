<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Halaman <?= $data['judul']; ?> </title>
  <link rel="stylesheet" href="<?= BASEURL; ?> /css/bootstrap.css">
  <!-- Template Main CSS File -->
  <link href="<?= BASEURL; ?>/assets/css/style.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-lg" style="background-color: sandybrown;">
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="<?= BASEURL; ?>/img/logoUSD-removebg.png" height="50" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto mb-1 mb-lg-0">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/indexLogin">Home</a>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="perekamanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">Sarana Dan Prasarana</a>
            <ul class="dropdown-menu" aria-labelledby="perekamanDropdown" >
              <?php if ($_SESSION['role'] === 'BIRO' || $_SESSION['role'] === 'SEKRE') : ?>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/ruang">Ruang</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/barang">Barang</a></li>
              <?php endif; ?>
              <?php if ($_SESSION['role'] === 'MAHASISWA') : ?>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/tabelRuang">Ruang</a></li>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/perekaman/tabelBarang">Barang</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="permintaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black">Peminjaman</a>
            <ul class="dropdown-menu" aria-labelledby="permintaanDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/status">Status Permintaan</a></li>
              <?php if ($_SESSION['role'] === 'MAHASISWA') : ?>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/tambah">Perekaman Permintaan</a></li>
              <?php endif; ?>
              <?php if ($_SESSION['role'] === 'SEKRE') : ?>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/verif">Verifikasi</a></li>
              <?php endif; ?>
              <?php if ($_SESSION['role'] === 'BIRO') : ?>
                <li><a class="dropdown-item" href="<?= BASEURL; ?>/permintaan/konfirmasi">Konfirmasi</a></li>
              <?php endif; ?>
            </ul>
          </div>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/home/logout">Logout</a>
        </div>

        <div class="social-links d-none d-md-flex" style="padding-right: 50px;">
          <a href="https://www.usd.ac.id/fakultas/sainsdanteknologi/" class="facebook"><i class="bi bi-globe"></i></a>
          <a href="https://www.instagram.com/fstsanatadharma/" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@kpufstusd5012" class="youtube"><i class="bi bi-youtube"></i></i></a>
        </div>

      </div>
    </div>
  </nav>
