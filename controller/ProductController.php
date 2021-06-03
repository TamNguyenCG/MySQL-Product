<?php

namespace Controller;

use Model\DBConnection;
use Model\Product;
use Model\ProductDB;

class ProductController
{
    public ProductDB $productDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=exercise", "root", "@Tambeo91");
        $this->productDB = new ProductDB($connection->connect());
    }

    public function index()
    {
        $products = $this->productDB->getAll();
        include "view/list.php";
    }

    public function error(): array
    {
        $errors = [];
        $fields = ['name', 'price', 'description', 'producer'];

        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Must fill in blank spot';
            }
        }
        return $errors;
    }

    public function add()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "view/add.php";
        } else {
            $errors = $this->error();
            if (empty($errors)) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $des = $_POST['description'];
                $producer = $_POST['producer'];
                $product = new Product($name, $price, $des, $producer);
                $this->productDB->create($product);
                header("location: index.php");
            } else {
                include "view/add.php";
            }
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->productDB->del($id);
        header("location: index.php");
    }

    public function edit()
    {
        $id = $_REQUEST['id'];
        $products = $this->productDB->getByID($id);

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include "view/edit.php";
        } else {
            $errors = $this->error();
            if (empty($errors)) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $des = $_POST['description'];
                $producer = $_POST['producer'];
                $product = new Product($name, $price, $des, $producer);
                $this->productDB->edit($id, $product);
                header("location: index.php");
            } else {
                include "view/edit.php";
            }
        }
    }

    public function search()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = $_POST['search'];
            if (empty($text)) {
                $products = $this->productDB->getAll();
            } else {
                $products = $this->productDB->searchByName($text);
            }
            include "view/list.php";
        }
    }
}