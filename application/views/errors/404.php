<?php $this->load->view('layout/header'); ?>
<section id="page-title">

	<div class="container clearfix">
		<h1>Halaman Tidak Ditemukan</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item"><a href="#">Pages</a></li>
			<li class="breadcrumb-item active" aria-current="page">404</li>
		</ol>
	</div>
</section>
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="row align-items-center col-mb-80">

				<div class="col-lg-6">
					<div class="error404 center">404</div>
				</div>

				<div class="col-lg-6">

					<div class="heading-block text-center text-lg-start border-bottom-0">
						<h4>Ooopps.! Halaman yang sedang kamu cari, tidak bisa ditemukan.</h4>
					</div>
					<a href="<?= base_url() ?>" class="btn btn-success">Halaman Utama</a>

				</div>

			</div>

		</div>
	</div>
</section>
<?php $this->load->view('layout/footer'); ?>