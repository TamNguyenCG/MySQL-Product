<?php


namespace Model;


class Product
{
    public string $name;
    public int $price;
    public string $description;
    public string $producer;
    public int $id;

    public function __construct(string $name,
                                int $price,
                                string $description,
                                string $producer)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->producer = $producer;
    }
}