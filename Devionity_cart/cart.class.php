<?php
/**
 * Created by PhpStorm.
 * User: ADAM
 * Date: 18.05.2017
 * Time: 1:20
 */

class Cart
{
    private $products;

    function __construct()
    {
        $this->products = is_null(Cookie::get('book')) ? array() : unserialize(Cookie::get('books'));
    }

    function getProducts()
    {
        return $this->products;
    }

    public function addProduct($id)
    {
        $id = (int)$id;

        if (!in_array($id, $this->products)) {
            array_push($this->products, $id);
        }

        Cookie::set('books', serialize($this->products));
    }

    public function deleteProduct($id)
    {
        $id = (int)$id;

        $key = array_search($id, $this->products);
        if ($key !== false){
            unset($this->products[$key]);
        }

        Cookie::set('books', serialize($this->products));
    }

    public function clear()
    {
        Cookie::delete('books');
    }

    public function isEmpty()
    {
        return !$this->products;
    }
}