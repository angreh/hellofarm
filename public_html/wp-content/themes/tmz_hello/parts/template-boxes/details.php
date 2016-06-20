<div class="title_boxes">
    <div class="inner">
        <span class="innnummber">03.</span>ÚLTIMOS DETALHES
    </div>
</div><!-- .title_boxes -->

<div id="details-wrapper">

    <div class="clearfix">

        <?php $page = TMZ()->Page()->get('lactose'); ?>
        <div class="left">
            <div class="checkbox-wrapper lactose">
                <a class="checkarrow"></a>
                <a class="checkbox"></a>
                <div><?php echo $page->title; ?></div>
            </div>
            <p><?php echo $page->content; ?></p>
        </div>

        <?php $page = TMZ()->Page()->get('gluten'); ?>
        <div class="right">
            <div class="checkbox-wrapper gluten">
                <a class="checkarrow"></a>
                <a class="checkbox"></a>
                <div><?php echo $page->title; ?></div>
            </div>
            <p><?php echo $page->content; ?></p>
        </div>

    </div><!-- .clearfix -->


    <div class="button-detail">
        <div class="button-detail-inner">
            <div class="inner">
                <div class="valign">
                    CONTINUAR
                </div>
            </div><!-- .inner -->
        </div><!-- .buy-button-boxes -->
    </div><!-- .button-detail -->

</div>