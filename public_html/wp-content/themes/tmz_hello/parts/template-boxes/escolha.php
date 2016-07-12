<div class="title_boxes">
    <div class="inner">
        <span class="innnummber">01.</span>ESCOLHA SUA BOX
    </div>
</div>

<!--<p class="sub-title-boxes">-->
<!--    Lorem ipsum dolor sit amet, consectetuer Ispecialista im mé intende tudis nuam golada, vinho, uiski,-->
<!--    carirí, rum da jamaikis, só num pode ser mijis. nonummy nibh-->
<!--</p>-->

<div class="content-boxes">

<?php $products = TMZ()->Product()->getAll(); foreach($products as $product): ?>

    <div class="wrapper-boxes" id="b_<?php echo $product->ID; ?>">

        <div class="shadow"></div>

        <div class="shadow2"></div>

        <div class="title-boxes"><?php echo $product->title; ?></div>

        <div class="desc-boxes">

<!--            <div class="small-desc-boxes"> y x z products</div>-->

            <div class="large-desc-boxes">
                <?php echo $product->content; ?>
            </div>

        </div><!-- .desc-boxes -->

        <div class="price-boxes">
            <div class="valign">
                R$ <?php echo $product->price; ?>/MÊS
            </div>
        </div><!-- .price-boxes -->

        <div class="buy-button-boxes">
            <div class="inner">
                <div class="valign">
                    EU QUERO ESSE
                </div>
            </div><!-- .inner -->
        </div><!-- .buy-button-boxes -->

    </div><!-- .wrapper-boxes -->

<?php endforeach; ?>

</div><!-- .content-boxes -->
<div class="clearfix"></div>