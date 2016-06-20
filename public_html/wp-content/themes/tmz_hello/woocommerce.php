<?php

get_header();

echo '=] - contate a TMZ';

if ( have_posts() ) :

    woocommerce_content();

endif;

get_footer();
