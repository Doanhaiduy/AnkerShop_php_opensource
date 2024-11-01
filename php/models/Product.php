
<?php
class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $description;
    protected $category;
    protected $image;
    protected $stock;

    public function __construct($id, $name, $price, $description, $category, $image, $stock)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category = $category;
        $this->image = $image;
        $this->stock = $stock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getCategory($conn)
    {
        $sql = "SELECT * FROM product_category WHERE id = $this->category";
        $result = $conn->query($sql);
        $category = $result->fetch_assoc();
        return $category['category_name'];
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getStock()
    {
        return $this->stock;
    }
}
?>