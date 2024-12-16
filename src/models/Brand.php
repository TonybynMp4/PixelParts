<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Brand extends Model
{
    private $name;

    public function findAll()
    {
        $sql = "SELECT * FROM brand";
        $pdoStatement = $this->db->query($sql);
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM brand WHERE id = ".$id;
        $pdoStatement = $this->db->query($sql);
        $brand = $pdoStatement->fetchObject(Brand::class);

        return $brand;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
