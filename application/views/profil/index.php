<?php $this->load->view('layout/header'); ?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="row">
        <div class="col-md-12">
          <img src="<?= base_url('assets/images/icons/avatar.jpg') ?>" class="alignleft img-circle img-thumbnail my-0" alt="Avatar" style="max-width: 84px;">
          <div class="heading-block border-0">
            <h4 class="mt-4"><?= $user['nama_lengkap'] ?></h4>
            <?php if ($this->session->userdata('user_id') == $user['user_id']): ?>
              <a href="<?= base_url('Profil/edit') ?>">Edit <i class="icon-line-edit"></i></a>
            <?php endif ?>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <table class="table table-bordered table-striped table-hover table-light">
          <tr>
            <th style="text-align: right !important;" width="20%">Nama Lengkap</th>
            <td><span class="me-2">:</span><?= $user['nama_lengkap'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Username</th>
            <td><span class="me-2">:</span><?= $user['username'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Email</th>
            <td><span class="me-2">:</span><?= $user['user_email'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Telepon</th>
            <td><span class="me-2">:</span><?= $user['user_telepon'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Tanggal Lahir</th>
            <td><span class="me-2">:</span><?= $user['tanggal_lahir'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Jenis Kelamin</th>
            <td><span class="me-2">:</span><?= $user['jenis_kelamin'] ?></td>
          </tr>
          <tr>
            <th style="text-align: right !important;" width="20%">Alamat</th>
            <td><span class="me-2">:</span> <?= $user['alamat'] ?></td>
          </tr>
        </table>
      </div>
    </div>
</section>

<?php $this->load->view('layout/footer'); ?>

