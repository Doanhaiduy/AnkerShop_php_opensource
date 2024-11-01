<?php
include_once '../models/Category.php';

class CategoryController
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM product_category";
        $result = $this->conn->query($sql);
        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = new Category($row['id'], $row['category_name']);
                $categories[] = $category;
            }
        }
        return $categories;
    }
}
