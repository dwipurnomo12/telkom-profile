@extends('layouts.main')

@section('content')
<main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel">
          <div class="carousel-item active" style="background-image: url(assets_frontend/img/slide/hero.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"><span> Telkom Banyuwangi</span></h2>
                <p class="animate__animated animate__fadeInUp">Telkom Banyuwangi berkomitmen untuk memudahkan setiap langkah Anda dalam mendapatkan layanan terbaik. Bersama kami, Anda bisa merencanakan kunjungan tanpa kerumunan dan menghemat waktu berharga Anda. Selamat datang di era baru kenyamanan dan efisiensi di Telkom Banyuwangi</p>
                <a href="#featured" class="btn-get-started animate__animated animate__fadeInUp">Lihat Layanan</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section><!-- End Hero -->
  
  <!-- ======= Featured Section ======= -->
  <section id="featured" class="featured">
    <div class="container">

      <div class="row">
        <div class="col-lg-4">
          <div class="icon-box">
            <i class="bi bi-card-checklist"></i>
            <h3><a href="">Layanan Teknisi</a></h3>
            <p> layanan yang disediakan oleh Telkom Banyuwangi untuk membantu pelanggan dalam memperbaiki atau mengatasi masalah teknis terkait dengan layanan telekomunikasi, seperti gangguan koneksi internet, kerusakan perangkat, atau konfigurasi yang rumit</p>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="bi bi-bar-chart"></i>
            <h3><a href="">Layanan Pembayaran</a></h3>
            <p>Telkom Banyuwangi menyediakan layanan ini untuk memberikan kenyamanan kepada pelanggan dalam proses pembayaran agar mereka dapat menjaga akun mereka tetap aktif tanpa kesulitan.</p>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="bi bi-binoculars"></i>
            <h3><a href="">Layanan Pemasangan Baru</a></h3>
            <p>Telkom Banyuwangi  adalah solusi yang ditawarkan oleh Telkom Banyuwangi untuk pelanggan yang ingin mengaktifkan layanan telekomunikasi baru, seperti pemasangan koneksi internet broadband atau layanan telepon.</p>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Featured Section -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="row">
        <div class="col-lg-6">
          <img src="assets_frontend/img/about.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content">
          <h3>Telkom Banyuwangi menyediakan layanan antrian online untuk kemudahan kunjungan anda</h3>
          <p class="fst-italic">
              Dalam upaya kami untuk memberikan pelayanan yang lebih baik dan efisien kepada Anda, Telkom Banyuwangi dengan bangga mempersembahkan fitur antrian online. 
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> Kunjungi website resmi Telkom banyuwangi.</li>
            <li><i class="bi bi-check-circle"></i> Pilih menu antrian</li>
            <li><i class="bi bi-check-circle"></i> Pilih jenis antrian berdasarkan Layanan</li>
            <li><i class="bi bi-check-circle"></i> Masukan data diri dan tanggal kedatangan</li>
            <li><i class="bi bi-check-circle"></i> Simpan atau Cetak nomor antrian</li>
          </ul>
          <p>
              Tidak perlu menunggu lama lagi. Gunakan layanan antrian online untuk memangkas waktu Anda
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="row">

        @foreach ($layanans as $layanan)
          <div class="col-lg-4 my-2">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4>{{ $layanan->nm_layanan }}</h4>
              <a class="btn btn-custom" href="/antrian/daftar/{{ $layanan->slug }}" role="button">Ambil Antrian</a>
            </div>
          </div>
        @endforeach
        
      </div>

    </div>
  </section><!-- End Services Section -->


</main>
@endsection