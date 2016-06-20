<?php get_header(); ?>

<div class="page_container clearfix">
    <div class="container">
        <?php
        if ( have_posts() ) :

            the_post();

            the_content();

        endif;
        ?>
    </div>
</div><!-- page_container -->
<?php get_footer();