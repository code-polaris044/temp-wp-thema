<?php get_header(); ?>

<main class="p-gallery__main">
  <div class="p-gallery__mainWrap">
    <section class="l-underlayer__common">
      <div class="l-lower__bgWrap l-lower__bg__gallery">
        <h1 class="l-lower__mv__title">
          Gallery
        </h1>
      </div>
      <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
          bcn_display();
        } ?>
      </div>
    </section>
    <section class="p-gallery u-mb__100">
      <div class="p-gallery__post__list__wrap">
        <ul class="p-gallery__post__list">
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <li class="p-post__list__item">
                <figure class="p-post__list__item__wrap">
                  <a href="<?php the_permalink(); ?>" class="p-post__thumbnail__link u-mb__20">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/dist/images/common/noImage.jpg" alt="noimage" class="noimage">
                    <?php endif; ?>
                  </a>
                  <figcaption class="post-explanation__wrap">
                    <div class="p-post__link__wrap">
                      <a href="<?php echo esc_url(home_url()); ?>/gallery/" class="date__link">
                        <time class="post-list__date" datetime="<?php echo get_the_date('Y-m-d'); ?>" itemprop=”datepublished”><?php echo get_the_date('Y年m月d日'); ?></time>
                      </a>
                    </div>
                    <div class="p-post__title__wrap">
                      <a href="<?php the_permalink(); ?>" class="p-post__title__link">
                        <?php the_title(); ?>
                      </a>
                    </div>
                  </figcaption>
                </figure>
              </li>
            <?php endwhile; ?>
          <?php else : ?>
            <p class="post__none">投稿がありません。</p>
          <?php endif; ?>
        </ul>
      </div>
    </section>
    <section class="p-archive__pagination">
      <?php the_posts_pagination(
        array(
          'mid_size' => 1,
          'prev_text' => '<span class="pagination-angle-left-sp">前のページ</span>',
          'next_text' => '<span class="pagination-angle-right-sp">次のページ</span>',
          'show_all' => false,
        )
      ); ?>
    </section>
  </div>
</main>

<?php get_footer(); ?>
