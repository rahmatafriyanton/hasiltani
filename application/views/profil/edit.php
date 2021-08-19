<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Edit Profil</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Profil</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap pt-4">
    <div class="container clearfix">
      <div class="row ">
        <div class="col-md-12">
          <form id="form-edit">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>" id="nama_lengkap" placeholder="Masukkan nama lengkap">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" value="<?= $user['username'] ?>" disabled readonly>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" value="<?= $user['user_email'] ?>" disabled readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="">Telepon</label>
                <input type="text" class="form-control" id="user_telepon" name="user_telepon" value="<?= $user['user_telepon'] ?>">
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $user['tanggal_lahir'] ?>">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password">
                <small class="text-muted">*)Kosongkan jika tidak diganti</small>
              </div>

              <div class="form-group">
                <label for="">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="5"><?= $user['alamat'] ?></textarea>
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
    $('#jenis_kelamin').val("<?= $user['jenis_kelamin'] ?>")
    $('#form-edit').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: `<?= base_url('profil/edit_process') ?>`,
        type: 'post',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
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

