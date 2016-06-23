<?php get_header(); ?>

<div class="loading-boxes">

    <img src="/wp-content/themes/tmz_hello/assets/imgs/loading2.gif" alt="carregando">

</div>

<div id="boxes"></div>
<div id="switch-content">
    <div class="page_container clearfix">
        <div class="container">

            <?php if ( have_posts() ) : ?>
            <?php the_post(); ?>

                <div class="pages-title">
                    <div class="inner">
                        <?php the_title(); ?>
                    </div>
                </div><!-- .pages-title -->

                <div class="pages-content"><?php the_content(); ?></div>

            <?php endif; ?>

        </div><!-- .container -->
    </div><!-- page_container -->
</div><!-- #switch-content -->
<?php get_footer();