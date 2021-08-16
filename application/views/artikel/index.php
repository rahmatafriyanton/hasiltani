<?php $this->load->view('layout/header'); ?>
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="row gutter-40 col-mb-80">
        <!-- Sidebar
            ============================================= -->
        <?php $this->load->view('artikel/section/leftbar'); ?>

        <!-- Post Content
            ============================================= -->
        <?php $this->load->view('artikel/section/list_postingan'); ?>

        <!-- Sidebar
            ============================================= -->
        <?php $this->load->view('artikel/section/rightbar'); ?>
      </div>

    </div>
  </div>
</section><!-- #content end -->
<?php $this->load->view('layout/footer'); ?>