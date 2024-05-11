<?php get_header(); ?>

<main class="p-single__gallery__main">
  <section class="l-underlayer__common u-mb__100">
    <div class="l-lower__bgWrap l-lower__bg__gallery">
      <h1 class="l-lower__mv__title">
        Site Introduction
      </h1>
    </div>
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      } ?>
    </div>
  </section>
  <section class="p-single__gallery">
    <div class="p-single__galleryWrap u-mb__100">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="p-single__gallery__textWrap  u-mb__100">
            <h2 class="p-single__gallery__title">
              <?php the_title(); ?>
            </h2>
            <div class="p-single__gallery__linkwrap">
              <a href="<?php echo esc_url(home_url()); ?>/gallery/" class="p-single__gallery__date__link">
                <time class="p-single__gallery__date" datetime="<?php echo get_the_date('Y-m-d'); ?>" itemprop="datepublished"><?php echo get_the_date('Y年m月d日'); ?></time>
              </a>
            </div>
          </div>
          <?php
          $gallery_posts = get_posts(array('post_type' => 'gallery', 'p' => get_the_ID()));
          foreach ($gallery_posts as $post) : setup_postdata($post);
          ?>
            <?php
            $gallery_img1 = get_field('gallery_img1', get_the_ID());
            $gallery_img2 = get_field('gallery_img2', get_the_ID());
            $gallery_img3 = get_field('gallery_img3', get_the_ID());
            $gallery_img_sp = get_field('gallery_img_sp', get_the_ID());
            if (!empty($gallery_img1 || !empty($gallery_img2) || !empty($gallery_img3))) : ?>
              <div class="p-single__splideWrap">
                <div class="splide u-mb__50">
                  <div class="splide__track">
                    <ul class="splide__list">
                      <?php if (!empty($gallery_img1)) : ?>
                        <li class="splide__slide">
                          <div class="p-splide__imgWrap">
                            <img src="<?php echo esc_url($gallery_img1['url']); ?>" alt="<?php echo esc_attr($gallery_img1['alt']); ?>" class="p-single__gallery__img" />
                          </div>
                        </li>
                      <?php endif; ?>
                      <?php if (!empty($gallery_img2)) : ?>
                        <li class="splide__slide">
                          <div class="p-ssplidey__imgWrap">
                            <img src="<?php echo esc_url($gallery_img2['url']); ?>" alt="<?php echo esc_attr($gallery_img2['alt']); ?>" class="p-single__gallery__img" />
                          </div>
                        </li>
                      <?php endif; ?>
                      <?php if (!empty($gallery_img3)) : ?>
                        <li class="splide__slide">
                          <div class="p-splide__imgWrap">
                            <img src="<?php echo esc_url($gallery_img3['url']); ?>" alt="<?php echo esc_attr($gallery_img3['alt']); ?>" class="p-single__gallery__img" />
                          </div>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                  <ul class="splide__pagination"></ul>
                </div>
                <div class="p-single__gallery__imgSpWrap u-mb__100">
                  <img src="<?php echo esc_url($gallery_img_sp['url']); ?>" alt="<?php echo esc_attr($gallery_img_sp['alt']); ?>" class="p-single__gallery__imgSp" />
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
          <div class="p-single__gallery__richtextWrap u-mb__100">
            <?php the_content(); ?>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <p class="post__none">投稿がありません。</p>
      <?php endif; ?>
      <div class="p-single__gallery__btnWrap">
        <button class="p-single__gallery__back__btn">
          <a href="<?php echo esc_url(home_url()); ?>/gallery/" rel="noopener noreferrer" class="btn__link">
            一覧へ戻る
          </a>
        </button>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
