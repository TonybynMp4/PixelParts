<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Brand extends Model
{
    private $name;

    /**
     * Récupère toutes les marques (table brand) depuis la bdd
     * Retourne une liste d'objet (instances de la classe Brand => le model ou on est)
     */
    public function findAll()
    {
        $sql = "SELECT * FROM brand";
        $pdoStatement = $this->db->query($sql);
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;
    }

    /**
     * Récupère un seul produit en fonction de son id
     * Retourne un objet (une instance de la classe Brand => le model ou on est)
     */
    public function find($id)
    {
        // Ici on créer la requete SQL qui va récupérer le product en fonction de son id
        $sql = "SELECT * FROM brand WHERE id = ".$id;

        $pdoStatement = $this->db->query($sql);

        // Je veux récuperer UN objet Product, PDO le fait pour moi => fetchObject (fetch qu'une seule fois + converti en objet de la classe 'Product' donc le model Product)
        $brand = $pdoStatement->fetchObject(Brand::class);

        return $brand;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name) {
        $this->name = $name;
    }
}
