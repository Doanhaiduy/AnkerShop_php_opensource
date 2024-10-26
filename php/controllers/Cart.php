<?php
class CartController
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCartProducts($cartId)
    {
        $sql = "SELECT * FROM shopping_cart_item WHERE cart_id = $cartId";

        $result = $this->conn->query($sql);

        $cartItems = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cartItem = new CartItem($row['id'], $row['cart_id'], $row['product_id'], $row['quantity']);
                array_push($cartItems, $cartItem);
            }
        }

        return $cartItems;
    }

    public function addProductToCart($cartId, $productId, $quantity)
    {
        $sql = "INSERT INTO shopping_cart_item (cart_id, product_id, quantity) VALUES ($cartId, $productId, $quantity)";

        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function removeProductFromCart($cartId, $productId)
    {
        $sql = "DELETE FROM shopping_cart_item WHERE cart_id = $cartId AND product_id = $productId";

        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProductQuantity($cartId, $productId, $quantity)
    {
        $sql = "UPDATE shopping_cart_item SET quantity = $quantity WHERE cart_id = $cartId AND product_id = $productId";

        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotalPrice($cartId)
    {
        $sql = "SELECT SUM(product.price * shopping_cart_item.quantity) AS total FROM shopping_cart_item JOIN product ON shopping_cart_item.product_id = product.id WHERE shopping_cart_item.cart_id = $cartId";

        $result = $this->conn->query($sql);

        $row = $result->fetch_assoc();

        return $row['total'];
    }
}
