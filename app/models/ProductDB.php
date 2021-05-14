<?php

namespace app\models;

use PDO;

class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll($search = '')
    {
        if (empty($search)) {
            $sql = "SELECT * FROM products";
            $statement = $this->connection->prepare($sql);
        } else {
            $sql = "SELECT * FROM products WHERE name LIKE ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindValue(1, "%$search%");
        }

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function add(Product $product)
    {
        $sql = "INSERT INTO products(name, category, price, quantity, description) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $product->name);
        $statement->bindValue(2, $product->category);
        $statement->bindValue(3, $product->price);
        $statement->bindValue(4, $product->quantity);
        $statement->bindValue(5, $product->description);
        return $statement->execute();
    }

    public function edit(Product $product)
    {
        $sql = "UPDATE products SET name = ?, category = ?, price = ?, quantity = ?, description = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $product->name);
        $statement->bindValue(2, $product->category);
        $statement->bindValue(3, $product->price);
        $statement->bindValue(4, $product->quantity);
        $statement->bindValue(5, $product->description);
        $statement->bindValue(6, $product->id);
        return $statement->execute();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }
}
