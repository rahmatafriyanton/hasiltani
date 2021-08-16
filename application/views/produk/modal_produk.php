<div class="single-product shop-quick-view-ajax">
  <div class="ajax-modal-title">
    <h2>Jeruk Manis</h2>
  </div>
  <div class="product modal-padding">

    <div class="row col-mb-50">
      <div class="col-md-6">
        <div class="product-image">
          <div class="fslider" data-pagi="false">
            <div class="flexslider">
                <?php foreach ($produk['foto_produk'] as $foto): ?>
                  <div class="slide">
                    <a href="#">
                      <img src="<?= base_url('assets/img/produk/').$foto['foto_produk'] ?>" alt="Image 10" >
                    </a>
                  </div>
                <?php endforeach ?>
              <div class="slider-wrap">
              </div>
            </div>
          </div>
          <div class="sale-flash badge bg-danger p-2">Promo!</div>
        </div>
      </div>
      <div class="col-md-6 product-desc">
        <?php if ($produk['diskon'] >= 1): ?>
          <div class="product-price"><del>Rp <?= $produk['harga'] ?></del> <ins class="fw-semibold">Rp <?= $produk['harga'] * ($produk['diskon'] / 100) ?></ins></div>
        <?php else: ?>
          <div class="product-price"><ins class="fw-semibold">Rp <?= $produk['harga'] ?></ins></div>
        <?php endif ?>
        <div class="product-rating">
          <i class="icon-star3"></i>
          <i class="icon-star3"></i>
          <i class="icon-star3"></i>
          <i class="icon-star-half-full"></i>
          <i class="icon-star-empty"></i>
        </div>
        <div class="clear"></div>
        <div class="line"></div>

        <!-- Product Single - Quantity & Cart Button
                ============================================= -->
        <form class="cart mb-0" method="post" enctype='multipart/form-data'>
          <div class="quantity clearfix">
            <input type="button" value="-" class="minus">
            <input type="text" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="4" />
            <input type="button" value="+" class="plus">
          </div>
          <button type="submit" class="add-to-cart button m-0">Masukkan Keranjang</button>
        </form><!-- Product Single - Quantity & Cart Button End -->

        <div class="clear"></div>
        <div class="line"></div>
        <p><?= $produk['deskripsi'] ?></p>
        <div class="card product-meta mb-0">
          <div class="card-body">
            <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku"><?= $produk['produk_id'] ?></span></span>
            <span class="posted_in">Kategori: <a href="#" rel="tag"><?= $produk['nama_kategori'] ?></a>.</span>
            <span class="tagged_as">Tags: <a href="#" rel="tag"><?= $produk['tags'] ?></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>