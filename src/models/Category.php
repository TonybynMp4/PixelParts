<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Category extends Model {
    private $name;
    private $subtitle;
    private $picture;
    private $show_home;

    public function findAll() {
        $sql = "SELECT * FROM `category`";
        $pdoStatement = $this->db->query($sql);
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
    }

    public function find($id) {
        $sql = "SELECT * FROM `category` WHERE id = ".$id;
        $pdoStatement = $this->db->query($sql);
        $brand = $pdoStatement->fetchObject(Category::class);

        return $brand;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getSubtitle() {
        return $this->subtitle;
    }

    public function setSubtitle($subtitle) {
        $this->subtitle = $subtitle;
    }

    public function getImage() {
        return $this->picture;
    }

    public function setImage($picture) {
        $this->picture = $picture;
    }

    public function getShowHome() {
        return $this->show_home;
    }

    public function setShowHome($show_home) {
        $this->show_home = $show_home;
    }
}