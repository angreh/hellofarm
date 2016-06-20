<?php

require "TMZ.Product.class.php";
require "TMZ.Page.class.php";

class TMZInstances
{

    /**
     * @var TMZProduct
     */
    private $product = null;

    /**
     * @var TMZPage
     */
    private $page = null;

    /**
     * Instância da classe TMZ
     * @var TMZ
     */
    private static $_instance = null;

    /**
     * Retorna uma instância de AutoLoader, caso não exista é criada
     *
     * @return TMZ
     */
    public static function getInstance() {
        if (self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * @return TMZProduct
     */
    public function Product()
    {
        if( $this->product == null )
        {
            $this->product = new TMZProduct();
        }
        return $this->product;
    }

    /**
     * @return TMZPage
     */
    public function Page()
    {
        if( $this->page == null )
        {
            $this->page = new TMZPage();
        }
        return $this->page;
    }

}

/**
 * Retorna a instancia da classe TMZInstances
 *
 * @return TMZInstances
 */
function TMZ()
{
    return TMZInstances::getInstance();
}