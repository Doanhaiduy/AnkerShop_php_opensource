<?php
include_once '../models/Payment.php';
if (!isset($_SESSION)) {
    session_start();
}
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
        $sql = "SELECT * FROM shop_order WHERE user_id='$user' ORDER BY order_date DESC";
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


    public function addItemsToOrder($orderId)
    {
        $cartId = $_SESSION['user']['cart_id'];

        $sql = "SELECT * FROM shopping_cart_item WHERE cart_id=$cartId";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM product WHERE id=" . $row['product_id'];

                $result2 = $this->conn->query($sql);
                if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();
                    $productId = $row2['id'];
                    $quantity = $row['quantity'];
                    $price = $row2['price'];
                }

                $sql2 = "INSERT INTO order_line (order_id, product_id, quantity, price) VALUES ($orderId, $productId, $quantity, $price)";
                $result3 = @mysqli_query($this->conn, $sql2);

                if (!$result3) {
                    return false;
                }
            }

            return true;
        } else {

            return false;
        }
    }

    public function removeCartItem($cartId)
    {
        $sql = "DELETE FROM shopping_cart_item WHERE cart_id=$cartId";
        $result = @mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastOrderId()
    {
        $sql = "SELECT * FROM shop_order ORDER BY id DESC LIMIT 1";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['id'];
    }

    public function addOrder($order, $cartId)
    {
        $userId = $order->getUser();
        $orderDate = $order->getDate();
        $orderFullName = $order->getFullName();
        $orderPhone = $order->getPhoneNumber();
        $shippingAddress = $order->getAddress();
        $paymentMethodId = $order->getPayment();
        $orderNote = $order->getNote();

        $sql = "INSERT INTO shop_order (user_id, order_date, order_full_name, order_phone, shipping_address, payment_method_id, order_note) VALUES ('$userId', '$orderDate', '$orderFullName', '$orderPhone', '$shippingAddress', '$paymentMethodId', '$orderNote')";
        $result = @mysqli_query($this->conn, $sql);

        if ($result) {
            $orderId = $this->getLastOrderId();

            $result = $this->addItemsToOrder($orderId);

            if ($result) {
                $result = $this->removeCartItem($cartId);
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            
            return false;
        }
    }

    public function getTotalPrice($orderId)
    {
        $sql = "SELECT SUM(price * quantity) as total FROM order_line WHERE order_id=$orderId";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getPaymentMethods()
    {
        $sql = "SELECT * FROM payment_type";
        $result = $this->conn->query($sql);
        $paymentMethods = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $paymentMethod = new Payment($row['id'], $row['name']);
                $paymentMethods[] = $paymentMethod;
            }
        }
        return $paymentMethods;
    }

    public function getPaymentMethod($paymentId)
    {
        $sql = "SELECT * FROM payment_type WHERE id=$paymentId";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $paymentMethod = new Payment($row['id'], $row['name']);
            return $paymentMethod;
        }
    }
}

// $sql = "INSERT INTO shop_order (user_id, order_date, order_full_name, order_phone, shipping_address, payment_method_id, order_note) 
