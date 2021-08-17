<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Toko Saya</h1>
    <span>Kamu bisa mengatur produk di sini.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Toko</a></li>
      <li class="breadcrumb-item active" aria-current="page">Beranda</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">


      <div class="row ">

        <div class="col-md-9">
          <h4>Form Tambah Produk</h4>
          <form id="form-add">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Produk</label>
                  <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan Nama Produk">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Kategori</label>
                  <select class="form-control" name="nama_kategori" id="nama_kategori">
                    <option value="">Pilih Kategori</option>
                    <?php 
                    foreach ($kategori as $row) {
                      echo "<option value='{$row['nama_kategori']}'>{$row['nama_kategori']}</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tags</label>
                  <input type="text" class="form-control" name="tags" id="tags" placeholder="tags">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" placeholder="0">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="0">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Satuan</label>
                  <input type="text" class="form-control" name="satuan" id="satuan" placeholder="ex: kg">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Foto Produk</label><br>
                  <input id="foto_produk" name="foto_produk[]" type="file" class="file form-control" multiple>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Deskripsi Produk</label>
                  <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6"></textarea>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-end">
              <button class="btn btn-secondary me-3 back" id="btn-cancel">Batal</button>
              <button class="btn btn-success kirim">Simpan</button>
            </div>
          </form>
        </div>
        <div class="col-md-3">

          <div class="list-group">
            <a href="<?= base_url('seller/produk') ?>" class="list-group-item list-group-item-action d-flex justify-content-between active">
              <div>Produk</div><i class="icon-line-archive"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
              <div>Penjualan</div><i class="icon-newspaper3"></i>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between">
              <div>Pesanan</div><i class="icon-line-truck"></i>
            </a>
          </div>


        </div>
      </div>

    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $("#foto_produk").fileinput({
      showUpload: false,
      allowedFileExtensions: ["jpg", "png", "gif"],
      browseOnZoneClick: true,
      browseButtonClass: 'btn'
    });

    $('#foto_produk').on('fileclear', function(event) {
      $('.file-caption .invalid-feedback').remove();
    });

    $('#form-add').submit(function(e) {
      e.preventDefault();
      // data = $(this).serialize();
      data = new FormData($(this)[0]);
      $('.kirim').prop('disabled', true);

      $.ajax({
        url: `<?= base_url('Seller/add_process') ?>`,
        method: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: function(response) {
          if (response.status == 200) {
            $('.invalid-feedback').remove()
            alert(response.message)
            window.location.href = response.redirect
          } else {
            $('.kirim').prop('disabled', false);
            $.each(response.message, function(key, value) {
              element = $('#' + key);
              if (key == 'foto_produk') {
                element = $('.input-group');
              }
              element.closest('.form-group').find('.invalid-feedback').remove();
              element.removeClass('is-invalid')
              .removeClass('is-valid')
              .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
              element.after(value);
            })
          }
        },
        error: (e) => {
          alert(`${e.status} - ${e.statusText}`);
          $('.kirim').prop('disabled', false);
        }
      });
    });
  });
</script>

<?php $this->load->view('layout/footer'); ?>

