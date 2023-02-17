<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Pesanan Toko Saya</h1>
    <span>Semua pesanan ke Toko kamu ada di sini.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Toko</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pesanan</li>
    </ol>
  </div>

</section>
<section id="content">
  <div class="content-wrap pt-5">
    <div class="container clearfix">


      <div class="row ">
        <div class="col-md-3">
          <div class="list-group mb-5">
            <a href="<?= base_url('Seller') ?>" class="list-group-item list-group-item-action d-flex justify-content-between">
              <div>Produk</div><i class="icon-line-archive"></i>
            </a>
            <a href="<?= base_url('Pesanan') ?>" class="list-group-item list-group-item-action d-flex justify-content-between active">
              <div>Pesanan</div><i class="icon-line-truck"></i>
            </a>
          </div>
        </div>

        <div class="col-md-12">
          <table class="table table-bordered datatable">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Kode Transaksi</th>
                <th>Nama</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status Transaksi</th>
                <th>Status Pengiriman</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;foreach ($pesanan as $row): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><a href=""><?= $row['transaksi_id'] ?></a></td>   
                  <td><?= $row['penerima'] ?></td>   
                  <td><?= idr_format($row['total']) ?></td>   
                  <td><?= tanggal($row['created_date']) ?></td>   
                  <td>
                    <?php 
                    if ($row['status'] == 'settlement') {
                      echo "<span class='badge bg-success'>Dibayar</span>";
                    } else if ($row['status'] == 'expire') {
                      echo "<span class='badge bg-danger'>Kadaluarsa</span>";
                    } else if ($row['status'] == 'pending'){
                      echo "<span class='badge bg-info'>Menunggu Pembayaran</span>";
                    } else {
                      echo "<span class='badge bg-default'>{$row['status']}</span>";
                    };
                    ?>
                  </td>
                  <td>
                    <?php if ($row['status_pengiriman'] == '' && $row['status'] == 'settlement'): ?>
                      Menunggu Pengiriman
                    <?php else: ?>
                      <?= $row['status_pengiriman'] ?>
                    <?php endif ?>
                  </td>
                  <td>
                    <a href="<?= base_url('Pesanan/detail/').$row['transaksi_id'] ?>" class="btn btn-info text-white btn-sm" data-lightbox="ajax">
                      <i class="icon-line-expand"></i>
                    </a>
                    <?php if ($row['status'] == 'settlement'): ?>
                      <button class="btn btn-primary text-white btn-sm btn-pengiriman" data-transaksi_id="<?= $row['transaksi_id'] ?>">
                        <i class="icon-pencil"></i>
                      </button>
                    <?php endif ?>
                  </td>
                </tr> 
              <?php $no++;endforeach ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-pengiriman">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Proses Pengiriman</h4>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>
      <div class="modal-body">
        <form id="form-pengiriman" method="post">
          <input type="hidden" name="transaksi_id" value="" id="transaksi_id">
          <div class="form-group">
            <label>Jasa Kirim</label>
            <input type="text" class="form-control" id="jasa_kirim" name="jasa_kirim" placeholder="Ex: JNE">
          </div>
          <div class="form-group">
            <label>Nomor Resi</label>
            <input type="text" class="form-control" id="no_resi" name="no_resi" placeholder="Ex: JNE">
          </div>

          <button class="btn btn-success float-end" type="submit">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('.btn-pengiriman').click(function() {
      $('#form-pengiriman')[0].reset();
      $('#modal-pengiriman').modal('show')
      $('#transaksi_id').val($(this).data('transaksi_id'))
    })

    $('#form-pengiriman').submit(function(e) {
      e.preventDefault()
      me = $(this)
      $.ajax({
        url: "<?= base_url('Pesanan/proses_pengiriman') ?>",
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            $('.invalid-feedback').remove()
            alert('Pengiriman berhasil diupdate')
            location.reload()
          } else {
            $.each(response.message, function(key, value) {
              element = $('#' + key);
              element.parent().find('.invalid-feedback').remove();
              element.removeClass('is-invalid')
              .removeClass('is-valid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
              element.parent().append(value)
            })
          }
        },
        error: (e) => {
          alert(`${e.status} - ${e.statusText}`);
          $('.kirim').prop('disabled', false);
        }
      });
    })
  });
</script>

<?php $this->load->view('layout/footer'); ?>