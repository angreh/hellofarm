var produto = {};

$(function(){

    $('#menu-open').on('click',function(){
       $('#tmz-mobile-menu-wrapper').removeClass('hid');
        window.scrollTo(0, 0);
        return false;
    });

    $('#tmz-mobile-menu-wrapper a').on('click',function(){
        $('#tmz-mobile-menu-wrapper').addClass('hid');
    });

    $('.btn_escolha').on(
        'click',
        function()
        {
            $( '#header_logo').addClass( 'small' );
            $( '#switch-content').slideUp();
            $( '#boxes').slideUp();


            $( ".loading-boxes").slideDown(
                300,
                function(){
                    setTimeout( loadBoxPage, 1500 );
                }
            );
            return false;
        }
    );

    if( $('#billing_email').length ){
        $('label[for=billing_email]').html('E-mail');
    }

    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    payment();

    if( $('#billing_postcode').length )
    {
        //$( '#billing_postcode' ).mask( '00000-000' );
        console.log('Opa2');
    }

});

function payment()
{
    if( $( '#payment').length )
    {
        $( '#header_logo').addClass( 'semi-small' );

        var payDiv = $('#payment').detach();
        payDiv.appendTo('.tmz-cart-steptwo');

        //var info = $( '.woocommerce-shipping-fields').detach();
        //info.appendTo( '#order_wrapper' );

        var buttonEnd = $( '#payment .place-order').detach();
        buttonEnd.appendTo( '.tmz-cart-stepthree' );

        //$( '.azpaylte-cc-form-validate').mask( '00/0000' )
        $( '.tmz-end-button' ).on
        (
            'click',
            function()
            {
                $( '.tmz-cart-stepthree input[name=woocommerce_checkout_place_order]').click();
            }
        );
    }

}

function loadBoxPage()
{
    $.ajax({
        url: '/actions',
        method: 'post',
        data: 'act=products',
        success: function(data)
        {
            $('#boxes').html( data ).slideDown(
                500,
                function(){
                    setBoxAct()
                    setBackTitles();
                }
            );
            $( ".loading-boxes").slideUp();
        }
    });
}

function setBackTitles()
{
    $( '#passo_01 .title').on
    (
        'click',
        function()
        {
            if( $( '#passo_01 .title').hasClass( 'passook' ) )
            {
                $( '#passo_01 .title' ).slideUp();
                $( '#passo_02 .title' ).html( '02.ESCOLHA UM TIPO DE PLANO' ).removeClass('passook').slideDown();
                $( '#passo_03 .title' ).removeClass('passook').slideDown();

                $( '#passo_01 .products-div' ).slideDown();
                $( '#passo_02 .products-div' ).slideUp();
                $( '#passo_03 .products-div' ).slideUp();
            }
        }
    );

    $( '#passo_02 .title').on
    (
        'click',
        function()
        {
            if( $( '#passo_02 .title').hasClass( 'passook' ) )
            {
                $('#passo_02 .title').slideUp();
                $('#passo_03 .title').slideDown();

                $('#passo_02 .products-div').slideDown();
                $('#passo_03 .products-div').slideUp();
            }
        }
    );

    produto.lactose = false;
    produto.gluten = false;

    $( '.checkbox-wrapper.lactose' ).on(
        'click',
        function()
        {
            if( produto.lactose == false )
            {
                produto.lactose = true;
                $( '.checkbox-wrapper.lactose .checkarrow').slideDown(300);
            }
            else
            {
                produto.lactose = false;
                $( '.checkbox-wrapper.lactose .checkarrow').slideUp(300);
            }
        }
    );

    $( '.checkbox-wrapper.gluten' ).on(
        'click',
        function()
        {
            if( produto.gluten == false )
            {
                produto.gluten = true;
                $( '.checkbox-wrapper.gluten .checkarrow').slideDown(300);
            }
            else
            {
                produto.gluten = false;
                $( '.checkbox-wrapper.gluten .checkarrow').slideUp(300);
            }
        }
    );

    $( '.button-detail-inner').on
    (
        'click',
        function()
        {
            $( '#boxes').slideUp();
            $( '.loading-boxes').slideDown();

            $.ajax({
                url: '/actions',
                data: 'act=addtocart&obj=' + JSON.stringify(produto),
                method: 'post',
                success: function(data)
                {
                    if( data == 'ok' )
                    {
                        window.location.href = '/finalizar-compra';
                    }
                }
            });
        }
    );
}
var to;
function setBoxAct(){
    $( '.wrapper-boxes' ).on(
        'click',
        function(){

            var divID = $(this).attr('id');
            var id = divID.slice(2);

            produto.id = id;

            var passo01title = $('#' + divID + ' .title-boxes').html();

            $( '#passo_01 .title')
                .html( '01.BOX: <strong>' + passo01title + '</strong>' )
                .addClass( 'passook' )
                .slideDown();

            $( '#passo_01 .products-div' ).slideUp();


            $( "#passo_02 .loading-planos").slideDown();

            $.ajax({
                url: '/actions',
                method: 'post',
                data: 'act=planos&id=' + id,
                success: function(data)
                {
                    $( '#passo_02 .content' ).html(data);

                    $( '.wrapper-plano.mensal').on(
                        'click',
                        function(){
                            produto.plano = 'mensal';
                            displayDetails();
                        }
                    );

                    $( '.wrapper-plano.trimestral').on(
                        'click',
                        function(){
                            produto.plano = 'trimestral';
                            displayDetails();
                        }
                    );

                    to = setTimeout(afterSleep, 1500);

                }
            });

        }
    );
}
function afterSleep(){
    $( "#passo_02 .loading-planos").slideUp();


    $( '#passo_02 .title' ).slideUp();
    $( '#passo_02 .products-div' ).slideDown();
}

function displayDetails()
{

    $( '#passo_02 .title')
        .html( '02.PLANO: <strong>' + produto.plano + '</strong>' )
        .addClass( 'passook' )
        .slideDown();;

    $( '#passo_02 .products-div' ).slideUp();

    $( '#passo_03 .title' ).slideUp();
    $( '#passo_03 .products-div' ).slideDown();
}

