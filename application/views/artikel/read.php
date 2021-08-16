<?php $this->load->view('layout/header'); ?>

<!-- Page Title
============================================= -->
<section id="page-title">

  <div class="container clearfix">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item"><a href="#">Artikel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Artikel</li>
    </ol>
  </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="row gutter-40 col-mb-80">
        <!-- Sidebar
                ============================================= -->
        <?php $this->load->view('artikel/section/rightbar'); ?>
        <!-- Post Content ============================================= -->
        <div class="postcontent col-lg-8 order-lg-first">

          <div class="single-post mb-0">

            <!-- Single Post
                        ============================================= -->
            <div class="entry clearfix">

              <!-- Entry Title
                            ============================================= -->
              <div class="entry-title">
                <h2><?= $detail['judul'] ?></h2>
              </div><!-- .entry-title end -->

              <!-- Entry Meta
                            ============================================= -->
              <div class="entry-meta">
                <ul>
                  <li><i class="icon-calendar3"></i> <?= tanggal($detail['created_at']) ?></li>
                  <li><a href="#"><i class="icon-user"></i> admin</a></li>
                  <li><a href="#"><i class="icon-comments"></i> 43 Komentar</a></li>
                  <li><a href="#"><i class="icon-eye"></i> 10x</a></li>
                </ul>
              </div><!-- .entry-meta end -->

              <!-- Entry Image
                            ============================================= -->
              <div class="entry-image">
                <?php if ($detail['thumbnail_artikel'] != ''): ?>
                  <a href="#"><img src="<?= base_url('assets/img/blog/').$detail['thumbnail_artikel'] ?>" style="max-height: 400px !important;"></a>
                <?php else: ?>
                  <a href="#"><img src="<?= base_url('assets/img/blog/blog-5.jpg') ?>" alt="Blog Single"></a>
                <?php endif ?>
              </div><!-- .entry-image end -->

              <!-- Entry Content
                            ============================================= -->
              <div class="entry-content mt-0" style="text-align: justify !important;">
                <?= $detail['deskripsi'] ?>
                <!-- Post Single - Content End -->

                <!-- Tag Cloud
                                ============================================= -->
                <div class="tagcloud clearfix bottommargin">
                  <a href="#"><?= $detail['tags'] ?></a>
                </div><!-- .tagcloud end -->

                <div class="clear"></div>
              </div>
            </div><!-- .entry end -->

          </div>

        </div><!-- .postcontent end -->

        
      </div>

    </div>
  </div>
</section><!-- #content end -->
<?php $this->load->view('layout/footer'); ?>

