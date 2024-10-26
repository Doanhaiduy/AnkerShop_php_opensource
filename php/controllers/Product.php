<?php
require_once 'Product.php';

class ProductController
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM product_category WHERE id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category = new Category($row['id'], $row['category_name']);
            return $category;
        }
    }


    public function getAllProducts()
    {
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql);
        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['category_id'], $row['product_image'], $row['stock']);
                array_push($products, $product);
            }
        }
        return $products;
    }

    public function getProductById($id)
    {
        $sql = "SELECT * FROM product WHERE id=$id";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['category_id'], $row['product_image'], $row['stock']);
            return $product;
        }
    }

    public function getProductsByCategory($category)
    {
        $sql = "SELECT * FROM product WHERE category_id='$category'";
        $result = $this->conn->query($sql);
        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['category_id'], $row['product_image'], $row['stock']);
                array_push($products, $product);
            }
        }
        return $products;
    }

    public function getProductsBySearch($search)
    {
        $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
        $result = $this->conn->query($sql);
        $products = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = new Product($row['id'], $row['name'], $row['price'], $row['description'], $row['category_id'], $row['product_image'], $row['stock'], $row['discount']);
                array_push($products, $product);
            }
        }
        return $products;
    }
}
