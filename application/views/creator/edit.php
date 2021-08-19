<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Edit Artikel</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Artikel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Artikel Saya</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap pt-4">
    <div class="container clearfix">
      <div class="row ">
        <div class="col-md-12">
          <form id="form-edit">
            <input type="hidden" value="<?= $detail['artikel_id'] ?>" name="artikel_id">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="<?= $detail['judul'] ?>">
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
                  <input type="text" class="form-control" name="tags" id="tags" placeholder="tags" value="<?= $detail['tags'] ?>">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Deskrpsi</label>
                  <textarea class="form-control summernote" name="deskripsi" id="deskripsi" rows="10">
                    <?= $detail['deskripsi'] ?>
                  </textarea>
                </div>
              </div>


              <div class="col-md-12">
                <label>Thumbnail</label>
                <input type="file" name="userfile" id="userfile" class="form-control">
              </div>
              <div class="col-md-12">
                <img src="<?= base_url('assets/img/blog/').$detail['thumbnail_artikel'] ?>" class="w-25 my-3 img-fluid img-thumbnail" alt="">
              </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
              <button class="btn btn-secondary me-3 back" id="btn-cancel">Batal</button>
              <button class="btn btn-success kirim">Simpan</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('#nama_kategori').val("<?= $detail['nama_kategori'] ?>")
    $('#form-edit').submit(function(e) {
      e.preventDefault();
      // data = $(this).serialize();
      data = new FormData($(this)[0]);
      $('.kirim').prop('disabled', true);

      $.ajax({
        url: `<?= base_url('Creator/edit_process') ?>`,
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
            alert('Data berhasil diupdate')
            window.location.href = response.redirect
          } else {
            $('.kirim').prop('disabled', false);
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

