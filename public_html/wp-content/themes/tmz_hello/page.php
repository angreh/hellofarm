<?php get_header(); ?>

<div class="container">
        <?php
        if ( have_posts() ) :

            the_post();

            the_content();

        endif;
        ?>
</div>
<?php get_footer();