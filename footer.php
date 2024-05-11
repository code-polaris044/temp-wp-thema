<!-- footer -->
<footer id="l-footer" class="l-footer">
  <div class="l-footerWeap">
    <div class="l-logo">
      <a href="<?php echo esc_url(home_url()); ?>/">
        <picture class="l-logo__picture">
          <source type="image/avif" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.avif">
          <source type="image/webp" srcset="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.webp">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/images/common/logo.png" alt="ロゴ">
        </picture>
      </a>
    </div>
    <nav id="l-footer__nav" class="l-footer__nav">
      <ul class="sns__container">
        <li class="sns__item">
          <a href="https://github.com/code-polaris044" target="_blank" rel="noopener noreferrer" class="l-sns__link">
            <i class="fa-brands fa-github"></i>
          </a>
        </li>
        <li class="sns__item">
          <a href="https://www.instagram.com/polaris.044/" target="_blank" rel="noopener noreferrer" class="l-sns__link">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <p class="l-copy">&copy;2023 Shunya Sugawara</p>
</footer>
<!-- wrapper -->
</div>
<?php wp_footer(); ?>
</body>

</html>
