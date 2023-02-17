<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <!-- Stylesheets-->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&display=swap" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/dark.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/swiper.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/colors.css') ?>" type="text/css" />
  <!-- shop Demo Specific Stylesheet -->
  <link rel="stylesheet" href="<?= base_url('assets/demos/shop/shop.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/demos/shop/css/fonts.css') ?>" type="text/css"/>

  <link rel="stylesheet" href="<?= base_url('assets/css/font-icons.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>" type="text/css"/>
  <link rel="stylesheet" href="<?= base_url('assets/css/magnific-popup.css') ?>" type="text/css"/>

  <!-- Summernote -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    
    

  <!-- Bootstrap Datatable -->
  <link rel="stylesheet" href="<?= base_url('assets/css/components/bs-datatable.css') ?>" type="text/css" />
  <!-- Bootstrap File Upload -->
  <link rel="stylesheet" href="<?= base_url('assets/css/components/bs-filestyle.css') ?>" type="text/css" />

  <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>" type="text/css" />

  <script src="<?= base_url('assets/js/jquery.js')?>"></script>

  <!-- Document Title
  ============================================= -->
  <title><?= $title ?></title>

</head>
<body class="stretched">
  <div id="top-bar" class="dark" style="background-color: #a3a5a7;">
    <div class="container">

      <div class="row justify-content-end align-items-center">

        <div class="col-12 col-lg-auto d-none d-lg-flex">

          <div class="top-links">
            <ul class="top-links-container">
              <li class="top-links-item"><a href="#">FAQS</a></li>
            </ul>
          </div>

          <ul id="top-social">
            <li>
              <a href="tel:+1.11.85412542" class="si-call">
                <span class="ts-icon"><i class="icon-call"></i></span>
                <span class="ts-text">+1.11.85412542</span>
              </a>
            </li>
            <li>
              <a href="mailto:hasiltani.id@gmail.com" class="si-facebook">
                <span class="ts-icon"><i class="icon-envelope-alt"></i></span>
                <span class="ts-text">hasiltani.id@gmail.com</span>
              </a>
            </li>
          </ul>

        </div>
      </div>

    </div>
  </div>

  <!-- Header-->
  <header id="header" class="full-header header-size-md">
    <div id="header-wrap">
      <div class="container">
        <div class="header-row justify-content-lg-between">

          <div id="logo" class="me-lg-4">
            <a href="" class="standard-logo"><img src="<?= base_url('assets/img/logo-1.png') ?>" alt="Canvas Logo"></a>
            <a href="" class="retina-logo"><img src="<?= base_url('assets/img/logo-1.png') ?>" alt="Canvas Logo"></a>
          </div>

          <div class="header-misc">

            <?php if ($this->session->userdata('username') != ''): $chart = isi_chart(3);?>
            <div id="top-cart" class="header-misc-icon d-none d-sm-block">
              <a href="#" class="me-1" id="top-cart-trigger">
                <i class="icon-line-bag"></i>
                <span class="top-cart-number"><?= count(isi_chart()) ?></span>
              </a>
              <div class="top-cart-content">
                <div class="top-cart-title">
                  <h4>Keranjang Belanja</h4>
                </div>
                <div class="top-cart-items">
                  <?php foreach ($chart as $row): ?>
                    <div class="top-cart-item">
                      <div class="top-cart-item-image">
                        <a href="#"><img src="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>" /></a>
                      </div>
                      <div class="top-cart-item-desc">
                        <div class="top-cart-item-desc-title">
                          <a href="#"><?= $row['nama_produk'] ?></a>
                          <span class="top-cart-item-price d-block"><?= idr_format($row['total']) ?></span>
                        </div>
                        <div class="top-cart-item-quantity">x <?= $row['jumlah'] ?></div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
                <div class="top-cart-action">
                  <a href="<?= base_url('Chart') ?>" class="button button-3d button-small m-0">Lihat Semua</a>
                </div>
              </div>
            </div>
            <?php endif ?>

            <div id="top-search" class="header-misc-icon">
              <a href="#" class="me-2" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
            </div>

            <div id="top-account">
              <?php if ($this->session->userdata('username') == ''): ?>
              <a href="#modal-register" data-lightbox="inline">
                <i class="icon-line2-user me-1 position-relative" style="top: 1px;"></i>
                <span class="d-none d-sm-inline-block  fw-medium">Masuk</span>
              </a>
              <?php else: ?>
              <div class="dropdown me-lg-0">
                <a href="#" class="btn btn-sm btn-warning text-white btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenu1" style="">
                  <a class="dropdown-item text-sm text-muted"><?= $this->session->userdata('nama_lengkap') ?></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-start" href="<?= base_url('Profil/') ?>">
                    <i class="icon-user21 me-2"></i>Profil
                  </a>
                  <a class="dropdown-item text-start" href="<?= base_url('Seller') ?>"><i class="icon-store me-2"></i>Toko Saya</a>
                  <a class="dropdown-item text-start" href="<?= base_url('Creator') ?>"><i class="icon-news me-2"></i>Artikel Saya</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-start" href="<?= base_url('Transaksi') ?>"><i class="icon-bill me-2"></i>Transaksi Saya</a>
                  <a class="dropdown-item text-start" href="<?= base_url('Transaksi/tagihan') ?>"><i class="icon-bill me-2"></i>Tagihan Saya</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-start" href="<?= base_url('Auth/keluar') ?>">Keluar <i class="icon-signout"></i></a>
                </ul>
              </div>
              <?php endif ?>
            </div>

          </div>

          <div id="primary-menu-trigger">
            <svg class="svg-trigger" viewBox="0 0 100 100">
              <path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
              <path d="m 30,50 h 40"></path>
              <path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
            </svg>
          </div>

          <nav class="primary-menu with-arrows me-lg-auto">

            <ul class="menu-container">
              <li class="menu-item home current">
                <a class="menu-link" href="<?= base_url() ?>">
                  <div>Home</div>
                </a>
              </li>

              <li class="menu-item artikel">
                <a class="menu-link Artikel" href="<?= base_url('Artikel') ?>">
                  <div>Artikel</div>
                </a>
              </li>

              <li class="menu-item belanja">
                <a class="menu-link" href="<?= base_url('Produk') ?>">
                  <div>Belanja</div>
                </a>
              </li>

              <li class="menu-item diskusi">
                <a class="menu-link" href="<?= base_url('Diskusi') ?>">
                  <div>Diskusi</div>
                </a>
              </li>
            </ul>

          </nav>

          <form class="top-search-form" action="" method="get">
            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
          </form>

        </div>
      </div>
    </div>
    <div class="header-wrap-clone"></div>
  </header>

  <!-- Login Modal -->
  <div class="modal1 mfp-hide" id="modal-register">
    <div class="card mx-auto" style="max-width: 540px;">
      <div class="card-header py-3 bg-transparent center">
        <h3 class="mb-0 fw-normal">Halaman Masuk</h3>
      </div>
      <div class="card-body mx-auto" style="max-width: 70%;">

        <img src="<?= base_url('assets/img/logo.png') ?>" alt="">

        <form id="login" class="mb-0 row" action="<?= base_url('auth/masuk') ?>" method="post">

          <div class="col-12">
            <input type="text" id="username" name="username" value="" class="form-control not-dark" placeholder="Email/Username" />
          </div>

          <div class="col-12 mt-3">
            <label for="Email"></label>
            <input type="password" id="password" name="password" value="" class="form-control not-dark" placeholder="Password" />
          </div>

          <div class="col-12">
            <a href="#" class="float-end text-dark fw-light mt-2">Lupa Password?</a>
          </div>

          <div class="col-12 mt-3">
            <button type="submit" class="button w-100 m-0">Masuk</button>
          </div>
        </form>
      </div>
      <div class="card-footer py-4 center">
        <p class="mb-0">Belum punya akun? <a href="<?= base_url('Register') ?>"><u>Daftar</u></a></p>
      </div>
    </div>
  </div>

<script>
  $(document).ready(function() {
    $('.menu-item').removeClass('current');
    var url = "<?= $this->router->fetch_class() ?>";
    $("." + url).addClass('current');

    $('#login').submit(function(e) {
      e.preventDefault();
      var me = $(this);
      $.ajax({
        url: me.attr('action'),
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid')
              .removeClass('is-valid')
              .addClass('is-valid')

            Swal.fire({
              title: 'Berhasil',
              text: 'Berhasil masuk!',
              icon: 'success',
              type: 'success',
              confirmButtonColor: '#1abc9c'
            }).then(function() {
              window.location = response.redirect;
            })
          } else {
            $.each(response.message, function(key, value) {
              var element = $('#' + key);
              element.parent()
                .find('.invalid-feedback').remove();
              element.removeClass('is-invalid')
                .removeClass('is-valid')
                .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
              element.after(value);
            })
          }
        }
      })
    })
  });
</script>
