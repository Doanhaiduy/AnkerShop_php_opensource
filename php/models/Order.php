<?php
class Order
{
    protected $id;
    protected $user;
    protected $date;
    protected $fullName;
    protected $phoneNumber;
    protected $address;
    protected $payment;
    protected $note;

    public function __construct($id, $user, $date, $fullName, $phoneNumber, $address, $payment, $note)
    {
        $this->id = $id;
        $this->user = $user;
        $this->date = $date;
        $this->fullName = $fullName;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->payment = $payment;
        $this->note = $note;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPayment()
    {
        return $this->payment;
    }

    public function getNote()
    {
        return $this->note;
    }
}

class OrderItem
{
    protected $id;
    protected $order;
    protected $product;
    protected $quantity;
    protected $price;

    public function __construct($id, $order, $product, $quantity)
    {
        $this->id = $id;
        $this->order = $order;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getOrder()
    {
        return $this->order;
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
