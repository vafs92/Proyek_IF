<!-- <link rel="stylesheet" href="<?= BASEURL; ?> /css/bootstrap.css"> -->

<header id="header" class="fixed-down d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo text-center mx-auto">
        <h1 style="color: black">
          Sistem Informasi Peminjaman Barang & Ruang</h1>
      </div>
    </div>
  </div>
</header>

<section id="hero" style="margin-top: 0px;">
  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <!-- <ol class="carousel-indicators" id="hero-carousel-indicators"></ol> -->

      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?= BASEURL; ?>/img/HomeUP.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate_animated animate_fadeInDown">Selamat Datang di SIP</h2>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item carousel-item next " style="background-image: url(<?= BASEURL; ?>/img/gedungFST.jpg);">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate_animated animate_fadeInDown">Fakultas Sains dan Teknologi</h2>
            </div>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon ri-arrow-left-line" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon ri-arrow-right-line" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section>

<footer id="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>KelompokSIP</span></strong>
    </div>
  </div>
</footer>
