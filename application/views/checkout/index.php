<?php $this->load->view('layout/header'); ?>
<?php $chart = isi_chart(); ?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="row col-mb-50 gutter-50">
        <div class="col-lg-6">
          <h4>Pesanan Kamu</h4>

          <div class="table-responsive">
            <table class="table cart">
              <thead>
                <tr>
                  <th class="cart-product-thumbnail">&nbsp;</th>
                  <th class="cart-product-name">Produk</th>
                  <th class="cart-product-quantity">Jumlah</th>
                  <th class="cart-product-subtotal">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $total = 0;foreach ($chart as $row): ?>
                <tr class="cart_item">
                  <td class="cart-product-thumbnail">
                    <a href="#"><img src="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" alt="<?= $row['nama_produk'] ?>" width="64" height="64"></a>
                  </td>
                  <td class="cart-product-name">
                    <a href="#"><?= $row['nama_produk'] ?></a>
                  </td>
                  <td class="cart-product-quantity">
                    <div class="quantity clearfix">
                      <?= $row['jumlah'].'x' ?>
                    </div>
                  </td>
                  <td class="cart-product-subtotal">
                    <span class="amount"><?= idr_format($row['total']) ?></span>
                  </td>
                </tr>
                <?php $total += $row['total'];endforeach ?>
                <tr class="cart_item">
                  <td class="border-top-0 cart-product-name"  colspan="3">
                    <strong>Sub Total</strong>
                  </td>

                  <td class="border-top-0 cart-product-name"  colspan="2">
                    <span class="amount"><?= idr_format($total) ?></span>
                  </td>
                </tr>
                <tr class="cart_item">
                  <td class="cart-product-name" colspan="3">
                    <strong>Pengiriman</strong>
                  </td>

                  <td class="cart-product-name" colspan="2">
                    <span class="amount">Bebas Pengiriman</span>
                  </td>
                </tr>

                <tr class="cart_item">
                  <td class="cart-product-name" colspan="3">
                    <strong>Total</strong>
                  </td>

                  <td class="cart-product-name" colspan="2">
                    <span class="amount color lead"><strong><?= idr_format($total) ?></strong></span>
                  </td>
                </tr>
              </tbody>

            </table>
          </div>
        </div>

        <div class="col-md-6">
          <h4>Detail Pemesanan</h4>

          <table class="table">
            <tr>
              <th>Penerima</th>
              <td>: <?= $this->session->userdata('nama_lengkap'); ?></td>
            </tr>
            <tr>
              <th>Telepon</th>
              <td>: <?= $this->session->userdata('user_telepon'); ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td>: <?= $this->session->userdata('alamat'); ?></td>
            </tr>
          </table>

          <form id="payment-form" method="post" action="<?= base_url('Checkout/simpan') ?>">
            <input type="hidden" name="result_type" id="result-type" value=""></div>
            <input type="hidden" name="result_data" id="result-data" value=""></div>
          </form>
          <a href="#" class="button button-3d float-end buat_pesanan">Buat Pesanan</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript"src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-un-F27A5sAYpvnGk"></script>
<script>
  $(document).ready(function() {
    $('.buat_pesanan').click(function(e) {
      e.preventDefault()
      // $.ajax({
      //   url: "<?= base_url('Checkout/buat_pesanan') ?>",
      //   type: 'post',
      //   dataType: 'json',
      //   success: function(response) {
      //     if (response.success == true) {
      //       Swal.fire({
      //         title: 'Berhasil',
      //         text: 'Pesanan berhasil dibuat!',
      //         icon: 'success',
      //         type: 'success',
      //         confirmButtonColor: '#1abc9c'
      //       }).then(function() {
      //         window.location = response.redirect;
      //       })
      //     } else {
      //        Swal.fire({
      //         title: 'Error',
      //         text: 'Terjadi Kesalahan! Hubungi Admin',
      //         icon: 'error',
      //         type: 'error',
      //         confirmButtonColor: '#1abc9c'
      //       })
      //     }
      //   },
      //   done: (function() {
      //     Pace.done()
      //   })
      // })

      $.ajax({
      url: "<?= base_url('Checkout/buat_pesanan') ?>",
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
    })
  });
</script>

<?php $this->load->view('layout/footer'); ?>