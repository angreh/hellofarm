<?php //a variável $ID referente ao id do plano é declarada no arquivo ../../page-tmzactions.php ?>

<div class="title_boxes">
    <div class="inner">
        <span class="innnummber">02.</span>ESCOLHA UM TIPO DE PLANO
    </div>
</div><!-- .title_boxes -->

<div class="wrapper-planos clearfix">


    <?php

    //pegando atributos da pagina
    $page = TMZ()->Page()->get( 'mensal' );

    //pegando valor do plano
    $price = TMZ()->Product()->getPlanoPrice( $ID, 'mensal' );
    $price = number_format( $price, 2, ',', '.' );

    ?>
    <div class="wrapper-plano mensal">
        <!-- BEGIN: PLANO MENSAL -->

        <div class="plano-title"><?php echo $page->title; ?></div>

        <div class="plano-desc">

            <div class="price">R$ <?php echo $price ?></div>

            <div class="inner">
                <?php echo $page->content; ?>
            </div>

        </div><!-- .desc -->

        <div class="button">
            <div class="inner">
                <div class="valign">
                    SELECIONAR
                </div><!-- .valign -->
            </div><!-- .inner -->
        </div><!-- .button -->

        <!-- END: PLANO MENSAL -->
    </div><!-- wrapper-plano mensal -->

    <?php

    //pegando atributos da pagina
    $page = TMZ()->Page()->get('trimestral');

    //pegando valor do plano
    $price = TMZ()->Product()->getPlanoPrice( $ID, 'trimestral' );
    $price = number_format( $price, 2, ',', '.' );

    ?>
    <div class="wrapper-plano trimestral">
        <!-- BEGIN: PLANO TRIMESTRAL -->

        <div class="plano-title"><?php echo $page->title; ?></div>

        <div class="plano-desc">

            <div class="price">R$ <?php echo $price ?></div>

            <div class="inner">
                <?php echo $page->content; ?>
            </div>

        </div><!-- .desc -->

        <div class="button">
            <div class="inner">
                <div class="valign">
                    SELECIONAR
                </div><!-- .valign -->
            </div><!-- .inner -->
        </div><!-- .button -->

        <!-- END: PLANO TRIMESTRAL -->
    </div><!-- wrapper-plano trimestral -->

</div><!-- .wrapper-planos -->