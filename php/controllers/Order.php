<?php
class OrderController
{

    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function getOrderById($id)
    {
        $sql = "SELECT * FROM shop_order WHERE id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $order = new Order($row['id'], $row['user_id'], $row['order_date'], $row['order_full_name'], $row['order_phone'], $row['shipping_address'], $row['payment_method_id'], $row['order_note']);
            return $order;
        }
    }

    public function getOrdersByUser($user)
    {
        $sql = "SELECT * FROM shop_order WHERE user_id='$user'";
        $result = $this->conn->query($sql);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = new Order($row['id'], $row['user_id'], $row['order_date'], $row['order_full_name'], $row['order_phone'], $row['shipping_address'], $row['payment_method_id'], $row['order_note']);
                $orders[] = $order;
            }
        }
        return $orders;
    }


    public function addItemsToOrder($orderId, $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $sql = "INSERT INTO order_line (order_id, product_id, quantity) VALUES ($orderId, {$cartItem->getProductId()}, {$cartItem->getQuantity()})";
            $result = $this->conn->query($sql);
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    public function addOrder($order, $cartItems)
    {
        $itemsAdded = $this->addItemsToOrder($order->getId(), $cartItems);

        if ($itemsAdded) {
            $sql = "INSERT INTO shop_order (user_id, order_date, order_full_name, order_phone, shipping_address, payment_method_id, order_note) VALUES (
                '{$order->getUser()}',
                '{$order->getDate()}',
                '{$order->getFullName()}',
                '{$order->getPhoneNumber()}',
                '{$order->getAddress()}',
                '{$order->getPayment()}',
                '{$order->getNote()}'
            )";
            $result = $this->conn->query($sql);
            return $result ? true : false;
        } else {
            return false;
        }
    }
}
