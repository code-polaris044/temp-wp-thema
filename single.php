<?php get_header(); ?>

<main class="p-single__main">
  <section class="l-underlayer__common">
    <?php
    include('templates/under-mv.php');
    ?>
  </section>
  <section class="p-single">
    <div class="p-single__wrap">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="p-single__links__wrap">
            <button class="p-single__category__btn">
              <a href="<?php echo esc_url(home_url()); ?>/news/" class="btn__link">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                  echo esc_html($categories[0]->name);
                }
                ?>
              </a>
            </button>
            <a href="<?php echo esc_url(home_url()); ?>/news/" class="date__link">
              <time class="p-post__list__date" datetime="<?php echo get_the_date('Y-m-d'); ?>" itemprop=”datepublished”><?php echo get_the_date('Y年m月d日'); ?></time>
            </a>
          </div>
          <div class="p-single__contents u-mb__100">
            <h2 class="p-single__title"><?php the_title(); ?></h2>
            <div class="p-subtitel__line"></div>
            <div class="p-single__text__wrap">
              <?php the_content(); ?>
            </div>
          </div>
          <div class="p-pager__linkWrap u-mb__100">
            <div class="pager__prev">
              <?php previous_post_link('<i class="fa-solid fa-caret-left"></i> %link', '%title', true); ?>
            </div>
            <div class="pager__next">
              <?php next_post_link(' %link <i class="fa-solid fa-caret-right"></i>', '%title', true); ?>
            </div>
          </div>
          <button class="single__btn">
            <a href="<?php echo esc_url(home_url()); ?>/news/" rel="noopener noreferrer" class="btn__link">
              一覧へ戻る
            </a>
          </button>
        <?php endwhile; ?>
      <?php else : ?>
        <p>投稿がありません</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
