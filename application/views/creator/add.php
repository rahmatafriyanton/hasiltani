<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Artikel Saya</h1>
    <span>Kamu bisa membagikan apapun di sini.</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Artikel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Artikel Saya</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap" style="padding-top: 50px !important;">
    <div class="container clearfix">


      <div class="row ">

        <div class="col-md-12">
          <h4 class="pb-4 font-weight-bolder">Buat Artikel Terbaikmu Sekarang</h4>
          <form id="form-add">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul">
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

              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Deskrpsi</label>
                  <textarea class="form-control summernote" name="deskripsi" id="deskripsi" rows="10"></textarea>
                </div>
              </div>

              <div class="col-md-12">
                <input type="file" name="userfile" id="userfile" class="form-control">
              </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
              <button class="btn btn-secondary me-3 back" id="btn-cancel">Batal</button>
              <button class="btn btn-success kirim">Simpan</button>
            </div>
          </form>
        </div>
        <!-- <div class="col-md-3">

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


        </div> -->
      </div>

    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('#form-add').submit(function(e) {
      e.preventDefault();
      // data = $(this).serialize();
      data = new FormData($(this)[0]);
      $('.kirim').prop('disabled', true);

      $.ajax({
        url: `<?= base_url('Creator/add_process') ?>`,
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
              // if (key == 'foto_produk') {
              //   element = $('.input-group');
              // }
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
    });

  // Inisiasi Summernote
  $('.summernote').summernote({
    height: 350,
    minHeight: null,
    maxHeight: null,
    lang: 'id-ID',
    callbacks: {
      onImageUpload: function(image) {
        uploadImage($(this), image[0]);
      },
      onMediaDelete: function(target) {
        deleteImage($(this), target[0].src);
      }
    }
  });

  // Upload Gambar Summernote
  function uploadImage(dataSummer, image) {
    var data = new FormData();
    data.append("userfile", image);
    $.ajax({
      url: "<?php echo base_url('Creator/upload_gambar')?>",
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      type: "POST",
      success: function(url) {
        dataSummer.summernote("insertImage", url);
      },
      error: function(e) {
        console.log(e);
      }
    });
  }

  // Hapus Gambar Summernote
  function deleteImage(dataSummer, src) {
    $.ajax({
      data: {
        src: src
      },
      type: "POST",
      url: "<?php echo base_url('Creator/hapus_gambar')?>",
      cache: false,
      success: function(response) {
        console.log(response);
      }
    });
  }
  });
</script>

<?php $this->load->view('layout/footer'); ?>

