<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Keranjang Saya</h1>
    <span>Sedikit lagi dan produk impian akan sampai ke tanganmu.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Beranda</a></li>
      <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
    </ol>
  </div>

</section>
<?php $chart = isi_chart(); ?>
<section id="content">
  <div class="content-wrap">
    <div class="container">

      <table class="table cart mb-5">
        <thead>
          <tr>
            <th class="cart-product-remove">&nbsp;</th>
            <th class="cart-product-thumbnail">&nbsp;</th>
            <th class="cart-product-name">Produk</th>
            <th class="cart-product-price">Unit Price</th>
            <th class="cart-product-quantity">Jumlah</th>
            <th class="cart-product-subtotal">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($chart as $row): ?>
            <tr class="cart_item">
              <td class="cart-product-remove">
                <a href="#" class="hapus-item remove" data-id="<?= $row['chart_id'] ?>" title="Hapus Item"><i class="icon-trash2"></i></a>
              </td>

              <td class="cart-product-thumbnail">
                <a href="#"><img src="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>" width="64" height="64"></a>
              </td>

              <td class="cart-product-name">
                <a href="#"><?= $row['nama_produk'] ?></a>
              </td>

              <td class="cart-product-price">
                <span class="amount"><?= idr_format($row['total'] / $row['jumlah']) ?></span>
              </td>

              <td class="cart-product-quantity">
                <div class="quantity">
                  <input type="button" value="-" class="minus">
                  <input type="text" name="quantity" value="<?= $row['jumlah'] ?>" class="qty" data-id="<?= $row['chart_id'] ?>" data-harga="<?= $row['total'] / $row['jumlah'] ?>">
                  <input type="button" value="+" class="plus">
                </div>
              </td>

              <td class="cart-product-subtotal">
                <span class="amount"><?= idr_format($row['total']) ?></span>
              </td>
            </tr>
          <?php endforeach ?>


          <tr class="cart_item">
            <td colspan="6">
              <div class="row justify-content-end py-2 col-mb-30">
                <div class="col-lg-auto pe-lg-0">
                  <a href="<?= base_url('Checkout') ?>" class="button button-3d mt-2 mt-sm-0 me-0">Checkout Sekarang</a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>

      </table>

    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('.qty').change(function() {
      update_chart($(this))
    })

    function update_chart(chart) {
      $.ajax({
        url: "<?= base_url('Chart/update_chart') ?>",
        type: 'post',
        data: {
          chart_id: chart.data('id'),
          jumlah: chart.val(),
          total: chart.data('harga') * chart.val()
        },
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            location.reload()
          } else {
            alert('terjadi kesalahan')
          }
        },
        done: (function() {
          Pace.done()
        })
      })
    }
  });
</script>


<?php $this->load->view('layout/footer'); ?>

