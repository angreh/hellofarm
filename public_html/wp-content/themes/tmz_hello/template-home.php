<?php
/*
Template Name: Home Blocks
*/

get_header();

?>
<div class="loading-boxes">

    <img src="/wp-content/themes/tmz_hello/assets/imgs/loading2.gif" alt="carregando">

</div>
<div id="boxes"></div>
<div id="switch-content">
<?php

include("parts/template-home/banner.php");
include("parts/template-home/comofunciona.php");
include("parts/template-home/sociais.php");
include("parts/template-home/dicas.php");

?>
</div><!-- switch-content -->
<?php

get_footer();