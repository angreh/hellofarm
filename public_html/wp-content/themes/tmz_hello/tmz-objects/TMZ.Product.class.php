<?php

class TMZProduct
{
    public function getAll()
    {
        $args = array(
            'posts_per_page' => -1, //numero de posts por paginas
            'post_type' => 'product',
            'order' => 'ASC'
        );
        $productsQuery = new WP_Query($args);

        $products = $productsQuery->posts;

        wp_reset_query();

        $prodArr = array();
        foreach($products as $product)
        {
            $pp = new stdClass();


            /*
             * Pegando META GERAL
             */
            $meta = get_post_meta($product->ID);
            $metaAuxPlanoRemoviveis = unserialize($meta['_product_attributes'][0]);
            $planos = $metaAuxPlanoRemoviveis['planos'];

            $pp->ID = $product->ID;
            $pp->title = $product->post_title;
            $pp->content = $product->post_content;

            $pp->price = number_format($meta['_min_variation_price'][0], 2, ',', '.');

//            exit(var_dump($meta['_min_variation_price'][0]));

            $pp->planos = explode('|', $planos['value']);

            $prodArr[] = $pp;

        }

        return $prodArr;

    }

    public function getProductVariations( $productID )
    {
        $product = new WC_Product_Variable( $productID );
        $variations = $product->get_available_variations();

        return $variations;
    }

    public function getPlanoPrice( $productID, $planoSlug )
    {
        $variations = $this->getProductVariations($productID);

        foreach($variations as $variation)
        {
            if(
                isset($variation['attributes']['attribute_planos']) &&
                $variation['attributes']['attribute_planos'] == $planoSlug &&
                isset($variation['attributes']['attribute_removiveis']) &&
                $variation['attributes']['attribute_removiveis'] == 'normal'
            )
            {
                return $variation['display_price'];
            }
        }

        return false;
    }

    public function getProductVariationID( $prodObj )
    {
        if( $prodObj->gluten == 'false' && $prodObj->lactose == 'false' )
        {
            $removiveis = 'normal';
        }
        elseif( $prodObj->gluten == 'true' && $prodObj->lactose == 'false' )
        {
            $removiveis = 'gluten';
        }
        elseif( $prodObj->gluten == 'false' && $prodObj->lactose == 'true' )
        {
            $removiveis = 'lactose';
        }
        else {
            $removiveis = 'gluten-lactose';
        }

        $id = false;
        $variations = $this->getProductVariations( $prodObj->id );

        foreach($variations as $variation)
        {
            if(
                isset($variation['attributes']['attribute_planos']) &&
                $variation['attributes']['attribute_planos'] == $prodObj->plano &&
                isset($variation['attributes']['attribute_removiveis']) &&
                $variation['attributes']['attribute_removiveis'] == $removiveis
            )
            {
                $id = $variation['variation_id'];
            }
        }


        return $id;
    }

}