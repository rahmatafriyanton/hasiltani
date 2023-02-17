<?php $this->load->view('layout/header'); ?>

<section id="page-title" class="page-title-pattern">

  <div class="container clearfix">
    <h1>Pembuatan Akun</h1>
    <span>Buat akun HasilTani kamu sekarang</span>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Registrasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Form Registrasi</li>
    </ol>
  </div>

</section>

<section id="content">
  <div class="content-wrap" style="padding-top: 50px !important;">
    <div class="container clearfix">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8 ">
          <form id="register">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan nama lengkap">
                </div>
              </div>

              <div class="col-md-6">
              	<div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="username" id="username1" placeholder="Masukkan username">
                </div>
              </div>

              <div class="col-md-6">
              	<div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Masukkan username">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" name="password" id="password1" placeholder="Masukkan password">
            </div>

            <div class="d-flex justify-content-end mt-5">
              <a href="<?= base_url() ?>" class="btn btn-secondary me-3">Batal</a>
              <button class="btn btn-success kirim">Buat Akun</button>
            </div>
          </form>

         <div class="text-center">
         	 <p>
         	 	Sudah punya akun?
         	 	<a href="#modal-register" data-lightbox="inline">
         	 		Masuk
         	 	</a>
         	 </p>
         </div>
        </div>
      </div>

    </div>
  </div>
</section>


<?php $this->load->view('layout/footer'); ?>
<script>
  $(document).ready(function() {
    $('#register').submit(function(e) {
      e.preventDefault();
      var me = $(this);
      $.ajax({
        url: "<?= base_url('Register/process_register') ?>",
        type: 'post',
        data: me.serialize(),
        dataType: 'json',
        success: function(response) {
          $("#overlay").fadeOut(300);
          if (response.success == true) {
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid')
              .removeClass('is-valid')
              .addClass('is-valid')
            Swal.fire({
              title: 'Berhasil',
              text: 'Berhasil masuk!',
              icon: 'success',
              type: 'success',
              confirmButtonColor: '#1abc9c'
            }).then(function() {
              window.location = response.redirect;
            })

          } else {
            $.each(response.message, function(key, value) {
              element = $('#' + key);
              if (key == 'username' || key == 'password') {
                element = $('#' + key + '1');
              }
              element.parent()
                .find('.invalid-feedback').remove();
              element.removeClass('is-invalid')
                .removeClass('is-valid')
                .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
              element.after(value);
            })
          }
        },
        done: (function() {
          Pace.done()
        })
      })
    })
  });
</script>