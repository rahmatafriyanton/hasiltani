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
          <h4>Form Edit Produk</h4>
          <form id="form-edit">
            <input type="hidden" name="produk_id" value="<?= $produk['produk_id'] ?>">
            <div class="row gx-3">
              <div class="form-group mb-3">
                <label for="">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan Nama Produk" value="<?= $produk['nama_produk'] ?>">
              </div>

              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="">Kategori</label>
                  <select class="form-control" name="nama_kategori" id="nama_kategori">
                    <option value="">Pilih Kategori</option>
                    <?php 
                    foreach ($kategori as $row) {
                      echo "<option value='{$row->nama_kategori}'>{$row->nama_kategori}</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label for="">Tags</label>
                  <input type="text" class="form-control" name="tags" id="tags" placeholder="tags" value="<?= $produk['tags'] ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="">Harga</label>
                  <input type="text" class="form-control" name="harga" id="harga" placeholder="0" value="<?= $produk['harga'] ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="">Stok</label>
                  <input type="text" class="form-control" name="stok" id="stok" placeholder="0" value="<?= $produk['stok'] ?>">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group mb-3">
                  <label for="">Satuan</label>
                  <input type="text" class="form-control" name="satuan" id="satuan" placeholder="ex: kg" value="<?= $produk['satuan'] ?>">
                </div>
              </div>

              <div class="col-12 my-3">
                <label></label>
                <div class="row car-list btn-group">
                  <?php foreach ($foto_produk as $row): ?>
                  <label class="car-image pe-0 col-6 col-md-3">
                    <div class="ms-0">
                      <input type="checkbox" name="foto_produk_hapus[]" autocomplete="off" value="<?= $row['foto_produk'] ?>">
                      <span class="text-danger text-capitalize">Hapus</span>
                      <img src="<?= base_url('assets/img/produk/').$row['foto_produk'] ?>" alt="Image">
                    </div>
                  </label>
                  <?php endforeach ?>
                </div>
              </div>

              <div class="form-group mb-3">
                <label>Foto Produk</label><br>
                <input id="foto_produk" name="foto_produk[]" type="file" class="file form-control" multiple>
              </div>

              <div class="form-group mb-3">
                <label for="">Deskripsi Produk</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="6"><?= $produk['deskripsi'] ?></textarea>
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
    $('#nama_kategori').val("<?= $produk['nama_kategori']; ?>")

    $("#foto_produk").fileinput({
      showUpload: false,
      allowedFileExtensions: ["jpg", "png", "gif"],
      browseOnZoneClick: true,
      browseButtonClass: 'btn'
    });

    $('#foto_produk').on('fileclear', function(event) {
      $('.file-caption .invalid-feedback').remove();
    });

    $('#form-edit').submit(function(e) {
      e.preventDefault();
      data = new FormData($(this)[0]);
      $('.kirim').prop('disabled', true);

      $.ajax({
        url: `<?= base_url('Seller/edit_process') ?>`,
        method: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        success: (response) => {
          if (response.status == '200') {
            alert('Data berhasil diubah')
            window.location.href = response.redirect;
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

