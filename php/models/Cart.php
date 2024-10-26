<?php
class Cart
{
    protected $id;
    protected $user;

    public function __construct($id, $user)
    {
        $this->id = $id;
        $this->user = $user;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }
}

class CartItem
{
    protected $id;
    protected $cart;
    protected $product;
    protected $quantity;

    public function __construct($id, $cart, $product, $quantity)
    {
        $this->id = $id;
        $this->cart = $cart;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}
