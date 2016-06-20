<?php
/*
Template Name: Actions
*/

if( isset($_POST['act']) && !empty($_POST['act'])  )
{
    $action = $_POST['act'];

    switch($action)
    {
        case 'products':

            include "parts/template-boxes/passos.php";
            break;

        case 'planos':

            $ID = $_POST['id'];
            include "parts/template-boxes/planos.php";
            break;

        case 'addtocart':

            $obj = $_POST['obj'];
            $obj = str_replace( '\"', "'", $obj );
            $obj = str_replace( array("'",'{','}'), '', $obj );
            $obj = explode( ',', $obj );

            $ppAux = new stdClass();
            foreach( $obj as $keyvalue )
            {
                $aux = explode( ':', $keyvalue );
                $ppAux->{$aux[0]} = $aux[1];
            }

            $IDVariacao = TMZ()->Product()->getProductVariationID( $ppAux );

            WC()->cart->empty_cart();
            WC()->cart->add_to_cart($ppAux->id,1,$IDVariacao);

            echo 'ok';

    }
}

