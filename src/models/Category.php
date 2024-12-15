<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Category extends Model
{
    private $name;
    private $subtitle;
    private $picture;
    private $show_home;

    /**
     * Récupère toutes les marques (table brand) depuis la bdd
     * Retourne une liste d'objet (instances de la classe Brand => le model ou on est)
     */
    public function findAll()
    {
        $sql = "SELECT * FROM `category`";
        $pdoStatement = $this->db->query($sql);
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $brands;
    }

    /**
     * Récupère un seul produit en fonction de son id
     * Retourne un objet (une instance de la classe Brand => le model ou on est)
     */
    public function find($id)
    {
        // Ici on créer la requete SQL qui va récupérer le product en fonction de son id
        $sql = "SELECT * FROM `category` WHERE id = ".$id;

        $pdoStatement = $this->db->query($sql);

        // Je veux récuperer UN objet Product, PDO le fait pour moi => fetchObject (fetch qu'une seule fois + converti en objet de la classe 'Product' donc le model Product)
        $brand = $pdoStatement->fetchObject(Category::class);

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

    /**
     * Get the value of subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */
    public function setSubtitle($subtitle) {
        $this->subtitle = $subtitle;
    }

    /**
     * Get the value of picture
     */
    public function getImage()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */
    public function setImage($picture) {
        $this->picture = $picture;
    }

    /**
     * Get the value of show_home
     */
    public function getShowHome()
    {
        return $this->show_home;
    }

    /**
     * Set the value of show_home
     *
     * @return  self
     */
    public function setShowHome($show_home) {
        $this->show_home = $show_home;
    }

}