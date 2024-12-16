<?php

namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Product extends Model
{
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    public function findAll()
    {
        $sql = "SELECT * FROM product";

        $pdoStatement = $this->db->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function findByCategory($id_category)
    {
        $sql = "SELECT * FROM product WHERE category_id = $id_category";

        $pdoStatement = $this->db->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function findByType($id_type)
    {
        $sql = "SELECT * FROM product WHERE type_id = $id_type";
        $pdoStatement = $this->db->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function findByBrand($id_brand)
    {
        $sql = "SELECT * FROM product WHERE brand_id = $id_brand";
        $pdoStatement = $this->db->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    /**
     * Récupère les produits en fonction des filtres passés en paramètre
        filters = [
            [
                'condition' => 'AND', // AND, OR, NOT, IN, ou combinaison de ces valeurs
                'name' => 'id',
                'value' => 1
            ],
        ]
     */
    public function getWithFilters($filters = null, $limit = null)
    {
        // on créer la liste de conditions
        $where = [];
        if ($filters) {
            foreach ($filters as $filter) {
                if (!$filter['value'] || !$filter['name']) {
                    continue;
                }

                $filter['condition'] = $filter['condition'] ?? '=';
                if ($filter['condition'] === 'IN') {
                    $filter['value'] = '(' . implode(',', $filter['value']) . ')';
                }
                $where[] = $filter['name'] . ' ' . $filter['condition'] . ' ' . $filter['value'];
            }
        }

        $sql = "SELECT * FROM product "
            . (!empty($where) ? 'WHERE ' . implode(' AND ', $where) : '')
            . ($limit ? " LIMIT $limit" : '');
        $pdoStatement = $this->db->query($sql);
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM product WHERE id = " . $id;
        $pdoStatement = $this->db->query($sql);
        $product = $pdoStatement->fetchObject(Product::class); // Product::class pour mettre le chemin complet (namespace + nomdeclasse)

        return $product;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getBrand_id()
    {
        return $this->brand_id;
    }

    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    public function getCategory_id()
    {
        return $this->category_id;
    }

    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function getType_id()
    {
        return $this->type_id;
    }

    public function setType_id($type_id)
    {
        $this->type_id = $type_id;
    }
}
