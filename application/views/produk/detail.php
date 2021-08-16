<?php $this->load->view('layout/header'); ?>
<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <h1>Brokoli Segar</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Belanja</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
    </ol>
  </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="row gutter-40 col-mb-80">
        <div class="postcontent col-lg-9 order-lg-last">

          <div class="single-product">
            <div class="product">
              <div class="row gutter-40">

                <div class="col-md-6">

                  <!-- Product Single - Gallery
                                    ============================================= -->
                  <div class="product-image">
                    <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                      <div class="flexslider">
                        <div class="slider-wrap" data-lightbox="gallery">
                          <?php foreach ($produk['produk']['foto_produk'] as $row): ?>
                            <div class="slide" data-thumb="<?= base_url('assets/img/produk/brokoli/brokoli-1.jpg') ?>">
                              <a href="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" title="<?= $row['foto_produk'] ?>" data-lightbox="gallery-item">
                                <img src="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" alt="<?= $row['foto_produk'] ?>">
                              </a>
                            </div>
                          <?php endforeach ?>
                        </div>
                      </div>
                    </div>
                    <div class="sale-flash badge bg-danger p-2">Murah!</div>
                  </div><!-- Product Single - Gallery End -->

                </div>

                <div class="col-md-6 product-desc">

                  <div class="d-flex align-items-center justify-content-between">

                    <?php if ($produk['produk']['diskon'] >= 1): ?>
                      <div class="product-price"><del>Rp <?= $produk['produk']['harga'] ?></del> <ins class="fw-semibold">Rp <?= $produk['produk']['harga'] * ($produk['produk']['diskon'] / 100) ?></ins></div>
                    <?php else: ?>
                      <div class="product-price"><ins class="fw-semibold">Rp <?= $produk['produk']['harga'] ?></ins></div>
                    <?php endif ?>

                    <div class="product-rating">
                      <i class="icon-star3"></i>
                      <i class="icon-star3"></i>
                      <i class="icon-star3"></i>
                      <i class="icon-star-half-full"></i>
                      <i class="icon-star-empty"></i>
                    </div><!-- Product Single - Rating End -->

                  </div>

                  <div class="line"></div>

                  <!-- Product Single - Quantity & Cart Button
                                    ============================================= -->
                  <form class="cart mb-0 d-flex justify-content-between align-items-center" method="post" enctype='multipart/form-data'>
                    <div class="quantity clearfix">
                      <input type="button" value="-" class="minus">
                      <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" />
                      <input type="button" value="+" class="plus">
                    </div>
                    <button type="submit" class="add-to-cart button m-0">Masukkan Keranjang</button>
                  </form><!-- Product Single - Quantity & Cart Button End -->

                  <div class="line"></div>
                  <p><?= $produk['produk']['deskripsi'] ?></p>

                  <div class="card product-meta">
                    <div class="card-body">
                      <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku"><?= $produk['produk']['produk_id'] ?></span></span>
                      <span class="posted_in">Kategori: <a href="#" rel="tag"> <?= $produk['produk']['nama_kategori'] ?></a>.</span>

                    </div>
                  </div><!-- Product Single - Meta End -->

                  <!-- Product Single - Share
                                    ============================================= -->
                  <div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
                    <span>Bagikan:</span>
                    <div>
                      <a href="#" class="social-icon si-borderless si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                      </a>
                      <a href="#" class="social-icon si-borderless si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                      </a>
                      <a href="#" class="social-icon si-borderless si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                      </a>
                      <a href="#" class="social-icon si-borderless si-gplus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                      </a>
                      <a href="#" class="social-icon si-borderless si-rss">
                        <i class="icon-rss"></i>
                        <i class="icon-rss"></i>
                      </a>
                      <a href="#" class="social-icon si-borderless si-email3">
                        <i class="icon-email3"></i>
                        <i class="icon-email3"></i>
                      </a>
                    </div>
                  </div><!-- Product Single - Share End -->

                </div>

                <div class="w-100"></div>

                <div class="col-12 mt-5">

                  <div class="tabs clearfix mb-0" id="tab-1">

                    <ul class="tab-nav clearfix">
                      <li><a href="#tabs-1"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Tanggapan (2)</span></a></li>
                    </ul>

                    <div class="tab-container">
                      <div class="tab-content clearfix" id="tabs-1">

                        <div id="reviews" class="clearfix">

                          <ol class="commentlist clearfix">

                            <li class="comment even thread-even depth-1" id="li-comment-1">
                              <div id="comment-1" class="comment-wrap clearfix">

                                <div class="comment-meta">
                                  <div class="comment-author vcard">
                                    <span class="comment-avatar clearfix">
                                      <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                  </div>
                                </div>

                                <div class="comment-content clearfix">
                                  <div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2021 at 10:46AM</a></span></div>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo perferendis aliquid tenetur. Aliquid, tempora, sit aliquam officiis nihil autem eum at repellendus facilis quaerat consequatur commodi laborum saepe non nemo nam maxime quis error tempore possimus est quasi reprehenderit fuga!</p>
                                  <div class="review-comment-ratings">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-half-full"></i>
                                  </div>
                                </div>

                                <div class="clear"></div>

                              </div>
                            </li>

                            <li class="comment even thread-even depth-1" id="li-comment-2">
                              <div id="comment-2" class="comment-wrap clearfix">

                                <div class="comment-meta">
                                  <div class="comment-author vcard">
                                    <span class="comment-avatar clearfix">
                                      <img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
                                  </div>
                                </div>

                                <div class="comment-content clearfix">
                                  <div class="comment-author">Mary Jane<span><a href="#" title="Permalink to this comment">June 16, 2021 at 6:00PM</a></span></div>
                                  <p>Quasi, blanditiis, neque ipsum numquam odit asperiores hic dolor necessitatibus libero sequi amet voluptatibus ipsam velit qui harum temporibus cum nemo iste aperiam explicabo fuga odio ratione sint fugiat consequuntur vitae adipisci delectus eum incidunt possimus tenetur excepturi at accusantium quod doloremque reprehenderit aut expedita labore error atque?</p>
                                  <div class="review-comment-ratings">
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star3"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                  </div>
                                </div>

                                <div class="clear"></div>

                              </div>
                            </li>

                          </ol>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="line"></div>

                  <div class="row">
                    <div class="col-md-4 d-none d-md-block">
                      <a href="#" title="Brand Logo"><img src="images/shop/brand2.jpg" alt="Brand Logo"></a>
                    </div>

                    <div class="col-md-8">

                      <div class="row gutter-30">

                        <div class="col-lg-6">
                          <div class="feature-box fbox-plain fbox-dark fbox-sm">
                            <div class="fbox-icon">
                              <i class="icon-thumbs-up2"></i>
                            </div>
                            <div class="fbox-content">
                              <h3>100% Langsung Dari Petani</h3>
                              <p class="mt-0">Kami Menghadirkan Produk Berkualitas Langsung Dari Petani.</p>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="feature-box fbox-plain fbox-dark fbox-sm">
                            <div class="fbox-icon">
                              <i class="icon-credit-cards"></i>
                            </div>
                            <div class="fbox-content">
                              <h3>Beragam Pilihan Pembayaran</h3>
                              <p class="mt-0">Kami Menerima Banyak Metode Pembayaran.</p>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="feature-box fbox-plain fbox-dark fbox-sm">
                            <div class="fbox-icon">
                              <i class="icon-truck2"></i>
                            </div>
                            <div class="fbox-content">
                              <h3>Potongan Harga Pengiriman</h3>
                              <p class="mt-0">Potongan Harga Pengiriman Untuk Produk Tertentu.</p>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="feature-box fbox-plain fbox-dark fbox-sm">
                            <div class="fbox-icon">
                              <i class="icon-undo"></i>
                            </div>
                            <div class="fbox-content">
                              <h3>Garansi Produk Tidak Segary</h3>
                              <p class="mt-0">Kembalikan Barang Apabila Diterima Dalam Keadaan Tidak Segar.</p>
                            </div>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="line"></div>

          <div class="w-100">

            <h4>Produk Terkait</h4>

            <div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">

              <div class="oc-item">
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
                    <div class="product-title mb-1">
                      <h3><a href="<?= base_url('belanja/detail_produk') ?>">Jeruk Manis</a></h3>
                    </div>
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

              <div class="oc-item">
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
                    <div class="product-title mb-1">
                      <h3><a href="<?= base_url('belanja/detail_produk') ?>">Brokoli Hijau</a></h3>
                    </div>
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

              <div class="oc-item">
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
                    <div class="product-title mb-1">
                      <h3><a href="<?= base_url('belanja/detail_produk') ?>">Kentang Besar</a></h3>
                    </div>
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

              <div class="oc-item">
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
                    <div class="product-title mb-1">
                      <h3><a href="<?= base_url('belanja/detail_produk') ?>">Apel Hijau</a></h3>
                    </div>
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

              <div class="oc-item">
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
                    <div class="product-title mb-1">
                      <h3><a href="<?= base_url('belanja/detail_produk') ?>">Wortel Lokal</a></h3>
                    </div>
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

            </div>

          </div>

        </div>

        <div class="sidebar col-lg-3">
          <div class="sidebar-widgets-wrap">

            <div class="widget clearfix">

              <h4>Produk Populer</h4>
              <div class="posts-sm row col-mb-30" id="popular-shop-list-sidebar">

                <div class="entry col-12">
                  <div class="grid-inner row g-0">
                    <div class="col-auto">
                      <div class="entry-image">
                        <a href="#"><img src="<?= base_url('assets/img/produk/jeruk/jeruk-1.jpg') ?>" alt="Image"></a>
                      </div>
                    </div>
                    <div class="col ps-3">
                      <div class="entry-title">
                        <h4><a href="#">Jeruk Manis</a></h4>
                      </div>
                      <div class="entry-meta no-separator">
                        <ul>
                          <li class="color">Rp.25.000</li>
                          <li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="entry col-12">
                  <div class="grid-inner row g-0">
                    <div class="col-auto">
                      <div class="entry-image">
                        <a href="#"><img src="<?= base_url('assets/img/produk/apel/apel-1.jpg') ?>" alt="Image"></a>
                      </div>
                    </div>
                    <div class="col ps-3">
                      <div class="entry-title">
                        <h4><a href="#">Apel Hijau</a></h4>
                      </div>
                      <div class="entry-meta no-separator">
                        <ul>
                          <li class="color">Rp.10.000</li>
                          <li><i class="icon-star3"></i><i class="icon-star3"></i><i class="icon-star-half-full"></i><i class="icon-star-empty"></i><i class="icon-star-empty"></i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section><!-- #content end -->

<?php $this->load->view('layout/footer'); ?>