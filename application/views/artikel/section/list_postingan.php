<div class="postcontent col-lg-6">

  <!-- Posts
              ============================================= -->
  <div id="posts" class="row grid-container gutter-30">

    <?php foreach ($artikel as $row): ?>
      <div class="entry col-12">
        <div class="grid-inner">
          <div class="entry-image">
            <a href="<?= base_url('assets/img/blog/').$row['thumbnail_artikel'] ?>" data-lightbox="image"><img src="<?= base_url('assets/img/blog/').$row['thumbnail_artikel'] ?>" alt=""></a>
          </div>
          <div class="entry-title">
            <h2><a href="<?= base_url('artikel/read/').$row['artikel_id'] ?>"><?= $row['judul'] ?></a></h2>
          </div>
          <div class="entry-meta">
            <ul>
              <li><i class="icon-calendar3"></i> <?= tanggal($row['created_at']) ?></li>
              <li><a href="#"><i class="icon-user"></i> admin</a></li>
              <li><a href="#comments"><i class="icon-comments"></i> 0</a></li>
              <li><a href="#"><i class="icon-eye"></i> 10x</a></li>
            </ul>
          </div>
        </div>
      </div>
    <?php endforeach ?>

    <!-- <div class="entry col-12">
      <div class="grid-inner">
        <div class="entry-image">
          <div class="fslider" data-arrows="false" data-lightbox="gallery">
            <div class="flexslider">
              <div class="slider-wrap">
                <div class="slide"><a href="<?= base_url('assets/img/blog/blog-5.jpg') ?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/blog/blog-5.jpg') ?>" alt="Standard Post with Gallery"></a></div>
                <div class="slide"><a href="<?= base_url('assets/img/blog/blog-6.jpg') ?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/blog/blog-6.jpg') ?>" alt="Standard Post with Gallery"></a></div>
                <div class="slide"><a href="<?= base_url('assets/img/blog/blog-7.jpg') ?>" data-lightbox="gallery-item"><img src="<?= base_url('assets/img/blog/blog-7.jpg') ?>" alt="Standard Post with Gallery"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="entry-title">
          <h2><a href="<?= base_url('artikel/detail_artikel') ?>">This is a Standard post with a Slider Gallery</a></h2>
        </div>
        <div class="entry-meta">
          <ul>
            <li><i class="icon-calendar3"></i> 24th Feb, 2021</li>
            <li><a href="#"><i class="icon-user"></i> admin</a></li>
            <li><i class="icon-folder-open"></i> <a href="#">Gallery</a>, <a href="#">Media</a></li>
            <li><a href="#comments"><i class="icon-comments"></i> 21</a></li>
            <li><a href="#"><i class="icon-picture"></i></a></li>
          </ul>
        </div>
        <div class="entry-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur voluptate rerum molestiae eaque possimus exercitationem eligendi fuga. Maiores, sunt eveniet doloremque porro hic exercitationem distinctio sequi adipisci. Nulla, fuga perferendis voluptatum beatae voluptate architecto laboriosam provident deserunt. Saepe!</p>
          <a href="<?= base_url('artikel/detail_artikel') ?>" class="more-link">Selengkapnya</a>
        </div>
      </div>
    </div> -->


  </div><!-- #posts end -->

  <!-- Pager
              ============================================= -->
  <div class="d-flex justify-content-between mt-5">
    <a href="#" class="btn btn-outline-secondary">&larr; Kembali</a>
    <a href="#" class="btn btn-outline-dark">Selanjutnya &rarr;</a>
  </div>
  <!-- .pager end -->

</div><!-- .postcontent end -->