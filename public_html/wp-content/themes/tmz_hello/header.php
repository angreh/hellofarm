<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo get_template_directory_uri() . '/style.css'; ?>" rel="stylesheet" />

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="tmz-mobile-menu-wrapper" class="hid">

        <div class="tmz-mobile-menu-header"></div>
        <div class="tmz-mobile-menu-logo">
            <a href="/">Hello Farm</a>
        </div>
        <div class="tmz-mobile-menu-menu">

            <ul>
                <li><a href="/#como-funciona">COMO FUNCIONA</a></li>
                <li><a href="#" class="btn_escolha">ESCOLHA SUA BOX</a></li>
                <li><a href="">PARA SUA EMPRESA</a></li>
                <li><a href="http://blog.hellofarm.com.br/" target="_blank">BLOG</a></li>
                <li><a href="/minha-conta">LOGIN</a> / <a href="/registro" class="thin">REGISTRO</a></li>
            </ul>

        </div>
        <a id="tmz-mobile-menu-close">
            <img src="/wp-content/themes/tmz_hello/assets/imgs/mobileClose.png">
        </a>

    </div>

    <div id="header">
        <div class="container">

            <div id="header_logo"><a href="/">Hello Farm</a></div>

            <div id="header_menu">

                <ul>
                    <li><a href="/#como-funciona">COMO FUNCIONA</a></li>
                    <li><a href="#" class="btn_escolha">ESCOLHA SUA BOX</a></li>
                    <li><a href="">PARA SUA EMPRESA</a></li>
                    <li><a href="http://blog.hellofarm.com.br/" target="_blank">BLOG</a></li>
                    <li><a href="/minha-conta">LOGIN</a> / <a href="/registro" class="thin">REGISTRO</a></li>
                </ul>

                <div class="header-mobile-button">
                    <a id="menu-open">
                        <img src="/wp-content/themes/tmz_hello/assets/imgs/mobilebutton.png">
                    </a>
                </div>

            </div><!-- #header_menu -->

        </div><!-- .container -->
    </div><!-- #header -->