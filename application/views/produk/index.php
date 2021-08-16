<?php $this->load->view('layout/header'); ?>

<!-- Content -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="row gutter-40 col-mb-80">
        <!-- Post Content
            ============================================= -->
        <div class="postcontent col-lg-10 order-lg-last">

          <!-- Shop
              ============================================= -->
          <div id="shop" class="shop row grid-container gutter-20" data-layout="fitRows">

            <?php foreach ($produk['produk'] as $row): ?>
              <div class="col-lg-2 col-md-3 col-6 px-2 sf-<?= str_replace(' ', '', $row['nama_kategori']) ?>">
                <div class="product">
                  <div class="product-image">
                    <div class="fslider" data-arrows="false" data-autoplay="4500">
                      <div class="flexslider">
                        <div class="slider-wrap">
                          <?php foreach ($row['foto_produk'] as $foto): ?>
                            <div class="slide">
                              <a href="#">
                                <img src="<?= base_url('assets/img/produk/').$foto['foto_produk'] ?>" alt="Image 10" style="max-height: 200px; min-height: 200px;">
                              </a>
                            </div>
                          <?php endforeach ?>
                        </div>
                      </div>
                    </div>
                    <div class="bg-overlay">
                      <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                        <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                        <a href="<?= base_url('Produk/modal_produk/').$row['produk_id'] ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                      </div>
                      <div class="bg-overlay-bg bg-transparent"></div>
                    </div>
                  </div>
                  <div class="product-desc">
                    <div class="product-title mb-1"><h3><a href="<?= base_url('produk/detail/').$row['produk_id'] ?>"><?= $row['nama_produk'] ?></a></h3></div>
                    <?php if ($row['diskon'] >= 1): ?>
                      <div class="product-price"><del>Rp <?= $row['harga'] ?></del> <ins class="fw-semibold">Rp <?= $row['harga'] * ($row['diskon'] / 100) ?></ins></div>
                    <?php else: ?>
                      <div class="product-price"><ins class="fw-semibold">Rp <?= $row['harga'] ?></ins></div>
                    <?php endif ?>
                    <div class="product-rating">
                      <i class="icon-star3"></i>
                      <i class="icon-star3"></i>
                      <i class="icon-star3"></i>
                      <i class="icon-star-half-full"></i>
                      <i class="icon-star-empty"></i>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            
            <!-- <div class="col-lg-2 col-md-3 col-6 px-2 sf-sayur">
              <div class="product">
                <div class="product-image">
                  <div class="fslider" data-arrows="false" data-autoplay="4500">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/brokoli/brokoli-1.jpg') ?>" alt="Image 10"></a></div>
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/brokoli/brokoli-2.jpg') ?>" alt="Image 10"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                      <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                      <a href="<?= base_url('assets/demos/shop/ajax/shop-item.html') ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                  </div>
                </div>
                <div class="product-desc">
                  <div class="product-title mb-1"><h3><a href="<?= base_url('belanja/detail_produk') ?>">Brokoli Hijau</a></h3></div>
                  <div class="product-price font-primary"><ins>Rp17.000</ins></div>
                  <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6 px-2 sf-sayur">
              <div class="product">
                <div class="product-image">
                  <div class="fslider" data-arrows="false" data-autoplay="4500">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/kentang/kentang-1.jpg') ?>" alt="Image 10"></a></div>
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/kentang/kentang-2.jpg') ?>" alt="Image 10"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                      <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                      <a href="<?= base_url('assets/demos/shop/ajax/shop-item.html') ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                  </div>
                </div>
                <div class="product-desc">
                  <div class="product-title mb-1"><h3><a href="<?= base_url('belanja/detail_produk') ?>">Kentang Besar</a></h3></div>
                  <div class="product-price font-primary"><del>Rp26.000</del> <ins>Rp24.000</ins></div>
                  <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6 px-2 sf-buah">
              <div class="product">
                <div class="product-image">
                  <div class="fslider" data-arrows="false" data-autoplay="4500">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/apel/apel-1.jpg') ?>" alt="Image 10"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                      <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                      <a href="<?= base_url('assets/demos/shop/ajax/shop-item.html') ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                  </div>
                </div>
                <div class="product-desc">
                  <div class="product-title mb-1"><h3><a href="<?= base_url('belanja/detail_produk') ?>">Apel Hijau</a></h3></div>
                  <div class="product-price font-primary"><del>Rp21.000</del> <ins>Rp16.000</ins></div>
                  <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6 px-2 sf-sayur">
              <div class="product">
                <div class="product-image">
                  <div class="fslider" data-arrows="false" data-autoplay="4500">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/wortel/wortel-1.jpg') ?>" alt="Image 10"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                      <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                      <a href="<?= base_url('assets/demos/shop/ajax/shop-item.html') ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                  </div>
                </div>
                <div class="product-desc">
                  <div class="product-title mb-1"><h3><a href="<?= base_url('belanja/detail_produk') ?>">Wortel Lokal</a></h3></div>
                  <div class="product-price font-primary"><del>Rp25.000</del> <ins>Rp20.000</ins></div>
                  <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 col-6 px-2 sf-buah">
              <div class="product">
                <div class="product-image">
                  <div class="fslider" data-arrows="false" data-autoplay="4500">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/jeruk/jeruk-1.jpg') ?>" alt="Image 10"></a></div>
                        <div class="slide"><a href="#"><img src="<?= base_url('assets/img/produk/jeruk/jeruk-2.jpg') ?>" alt="Image 10"></a></div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-overlay">
                    <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                      <a href="" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                      <a href="<?= base_url('assets/demos/shop/ajax/shop-item.html') ?>" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                    </div>
                    <div class="bg-overlay-bg bg-transparent"></div>
                  </div>
                </div>
                <div class="product-desc">
                  <div class="product-title mb-1"><h3><a href="<?= base_url('belanja/detail_produk') ?>">Jeruk Manis</a></h3></div>
                  <div class="product-price font-primary"><del>Rp25.000</del> <ins>Rp20.000</ins></div>
                  <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                  </div>
                </div>
              </div>
            </div> -->

          </div><!-- #shop end -->

        </div><!-- .postcontent end -->

        <!-- Sidebar
            ============================================= -->
        <div class="sidebar col-lg-2">
          <div class="sidebar-widgets-wrap">

            <div class="widget widget-filter-links">

              <h4>Kategori</h4>
              <ul class="custom-filter ps-2" data-container="#shop" data-active-class="active-filter">
                <li class="widget-filter-reset active-filter"><a href="#" data-filter="*">Bersihkan</a></li>
                <!-- <li><a href="#" data-filter=".sf-buah">Buah-Buahan</a></li>
                <li><a href="#" data-filter=".sf-bibit">Bibit</a></li>
                <li><a href="#" data-filter=".sf-pupuk">Pupuk</a></li>
                <li><a href="#" data-filter=".sf-sayur">Sayuran</a></li> -->
                <?php foreach ($kategori as $row): ?>
                  <li><a href="#" data-filter=".sf-<?= str_replace(' ', '', $row['nama_kategori']) ?>"><?= $row['nama_kategori'] ?></a></li>
                <?php endforeach ?>
              </ul>

            </div>

            <div class="widget widget-filter-links">

              <h4>Urut Berdasarkan</h4>
              <ul class="shop-sorting ps-2">
                <li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Bersihkan</a></li>
                <li><a href="#" data-sort-by="name">Nama</a></li>
                <li><a href="#" data-sort-by="price_lh">Harga: Terendah</a></li>
                <li><a href="#" data-sort-by="price_hl">Harga: Tertinggi</a></li>
              </ul>

            </div>

          </div>
        </div><!-- .sidebar end -->
      </div>

    </div>
  </div>
</section><!-- #content end -->

<?php $this->load->view('layout/footer'); ?>