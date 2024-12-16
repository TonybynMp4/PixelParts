<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Type extends Model
{
    private $name;

    public function findAll()
    {
        $sql = "SELECT * FROM `type`";
        $pdoStatement = $this->db->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM `type` WHERE id = ".$id;
        $pdoStatement = $this->db->query($sql);
        $type = $pdoStatement->fetchObject(Type::class);

        return $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}
