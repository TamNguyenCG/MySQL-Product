<?php

namespace Model;


class ProductDB
{
    public mixed $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array
    {
        $sql ="select * from `products`";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $products = [];
        foreach ($result as $item){
            $product = new Product($item['name'],$item['price'],$item['description'],$item['producer']);
            $product->id = $item['id'];
            $products[] = $product;
        }
        return $products;
    }

    public function create(object $product)
    {
        $sql = "insert into `products` (name,price,description,producer) values (?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$product->name);
        $stmt->bindParam(2,$product->price);
        $stmt->bindParam(3,$product->description);
        $stmt->bindParam(4,$product->producer);
        return $stmt->execute();
    }

    public function del($id)
    {
        $sql = "delete from `products` where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$id);
        return $stmt->execute();
    }

    public function edit($id, $product)
    {
        $sql = "update `products` set name = ?, price = ?, description = ?, producer = ? where id = ? ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$product->name);
        $stmt->bindParam(2,$product->price);
        $stmt->bindParam(3,$product->description);
        $stmt->bindParam(4,$product->producer);
        $stmt->bindParam(5,$id);
        return $stmt->execute();
    }

    public function getByID($id): array
    {
        $sql ="select * from `products` where id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $products = [];
        foreach ($result as $item){
            $product = new Product($item['name'],$item['price'],$item['description'],$item['producer']);
            $product->id = $item['id'];
            $products[] = $product;
        }
        return $products;
    }

    public function searchByName($text): array
    {
        $sql = "select * from `products` where `name` like :text";
        $stmt = $this->connection->prepare($sql);
        $txt='%'.$text.'%';
        $stmt->bindParam(':text',$txt);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $products = [];
        foreach ($result as $item){
            $product = new Product($item['name'],$item['price'],$item['description'],$item['producer']);
            $product->id = $item['id'];
            $products[] = $product;
        }
        return $products;
    }
}