<?php $this->load->view('layout/header'); ?>


<!-- Slider -->
<?php $this->load->view('home/section/slider'); ?>

<!-- Content
============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <!-- Shop Categories
      ============================================= -->
      <?php $this->load->view('home/section/kategori'); ?>

      <!-- Rekomendasi Produk
      ============================================= -->
      <?php $this->load->view('home/section/rekomendasi_produk'); ?>
    </div>


    <!-- Tentang Kami
    ============================================= -->
    <?php $this->load->view('home/section/tentang_hasil_tani'); ?>

    <!-- Tentang Kami
    ============================================= -->
    <?php $this->load->view('home/section/artikel_pilihan'); ?>


    <!-- Banner Sign Up
    ============================================= -->
    <?php $this->load->view('home/section/sign_up_banner'); ?>

    <div class="container">

      <!-- Features
      ============================================= -->
      <?php $this->load->view('home/section/list_fitur'); ?>

      <!-- App Buttons
      ============================================= -->
      <?php $this->load->view('home/section/mobile_app'); ?>

    </div>
</section><!-- #content end -->

<?php $this->load->view('layout/footer'); ?>

