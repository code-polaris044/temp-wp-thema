<?php get_header(); ?>

<main class="p-contact__main">
    <section class="l-underlayer__common">
        <?php
        include('templates/under-mv.php');
        ?>
    </section>
    <section class="p-contact">
        <div class="p-contactWrap">
            <?php echo do_shortcode('[mwform_formkey key="50"]'); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>
