<?php

namespace app\controllers;

use app\models\DBConnect;
use app\models\Product;
use app\models\ProductDB;

class ProductController
{
    public $productDB;

    public function __construct()
    {
        $connection = new DBConnect();
        $this->productDB = new ProductDB($connection->connect());
    }

    public function index()
    {
        if (isset($_GET['search'])) {
            $products = $this->productDB->getAll($_GET['search']);
        } else {
            $products = $this->productDB->getAll();
        }

        include_once __DIR__ . '/../views/index.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [
                'unknown' => null
            ];

            $product = new Product($_POST['name'], $_POST['category'], $_POST['price'], $_POST['quantity'], $_POST['description']);

            if ($this->productDB->add($product)) {
                header('Location: /');
                exit();
            } else {
                $errors['unknown'] = 'Có lỗi bất ngờ xảy ra';
            }
        }

        include_once __DIR__ . '/../views/add.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [
                'unknown' => null
            ];

            $product = new Product($_POST['name'], $_POST['category'], $_POST['price'], $_POST['quantity'], $_POST['description']);
            $product->id = $_POST['id'];

            if ($this->productDB->edit($product)) {
                header('Location: /');
                exit();
            } else {
                $errors['unknown'] = 'Có lỗi bất ngờ xảy ra';
                $product = $this->productDB->getById($product->id);
                include_once __DIR__ . '/../views/edit.php';
            }
        } else {
            $product = $this->productDB->getById($_GET['id']);
            include_once __DIR__ . '/../views/edit.php';
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->productDB->deleteById($_POST['id'])) {
                header('Location: /');
                exit;
            }
        }

        $product = $this->productDB->getById($_GET['id']);
        include_once __DIR__ . '/../views/delete.php';
    }
}
