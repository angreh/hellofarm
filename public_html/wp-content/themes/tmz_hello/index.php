<?php get_header(); ?>
<div class="loading-boxes">

    <img src="/wp-content/themes/tmz_hello/assets/imgs/loading2.gif" alt="carregando">

</div>
<div id="boxes"></div>
<div id="switch-content">

<?php
if ( have_posts() ) :

    the_post();

    the_content();

endif;
?>

</div><!-- .switch-content -->
<?php get_footer();