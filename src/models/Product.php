<?php
/**
 * Model Product => lié à la table product en bdd
 * Il faut que la classe ait le meme nom que le fichier et premiere lettre en majuscule
 */
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini

class Product extends Model
{
    // ces propriétés doivent avoir exactement le meme nom que leur homologue en BDD
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;

    /**
     * Récupère tous les produits (table product) depuis la bdd
     */
    public function findAll()
    {
        // Ici on créer la requete SQL qui va récupérer tous les products
        $sql = "SELECT * FROM product";

        // ici j'execute ma requete sql ($sql) et je stock le resultat de cette requete dans $pdoStatement
        $pdoStatement = $this->db->query($sql);

        // Pour l'instant $pdoStatement n'est pas une liste d'objets Product, pour transformer $pdoStatement en liste d'objet Product (model Product) => fetchAll
        //fetchAll prend 2 param
        // 1er = En quoi on veut convertir le resultat => ici en objets
        // 2eme = Objets de quelle classe ? => La classe Product (le model ou on est actuellement)
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        // On retourne le tableau d'objets Products
        return $products;
    }

    /**
     * On récupère TOUS les produits de la table product qui ont pour category_id la valeur de $id_category
     * Ce qui va nous retourner tous les produits associé à une catégorie
     * Par exemple si la catégorie c'est Détente on va récupérer tous les produits de la catégorie Détente
     */
    public function findByCategory($id_category)
    {
        // Ici on créer la requete SQL qui va récupérer tous les products en fonctiond el'id de la category qu'on veut
        // Selectionne TOUS les product OU category_id = $id_category
        $sql = "SELECT * FROM product WHERE category_id = $id_category";

        // ici j'execute ma requete sql ($sql) et je stock le resultat de cette requete dans $pdoStatement
        $pdoStatement = $this->db->query($sql);

        // Pour l'instant $pdoStatement n'est pas une liste d'objets Product, pour transformer $pdoStatement en liste d'objet Product (model Product) => fetchAll
        //fetchAll prend 2 param
        // 1er = En quoi on veut convertir le resultat => ici en objets
        // 2eme = Objets de quelle classe ? => La classe Product (le model ou on est actuellement)
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        // On retourne le tableau d'objets Products
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

    public function getWithFilters($search, $brand_id, $type_id, $category_id)
    {
        // On commence par créer la requete de base
        $where = array_filter([
            $search ? "name LIKE '%$search%'" : null,
            $brand_id ? "brand_id = $brand_id" : null,
            $type_id ? "type_id = $type_id" : null,
            $category_id ? "category_id = $category_id" : null
        ]);

        if (!$where) {
            return $this->findAll();
        }

        $sql = "SELECT * FROM product WHERE ". implode(' AND ', $where);

        // On execute la requete
        $pdoStatement = $this->db->query($sql);

        // On récupère les résultats
        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    /**
     * Récupère un seul produit en fonction de son id
     */
    public function find($id)
    {
        // Ici on créer la requete SQL qui va récupérer le product en fonction de son id
        $sql = "SELECT * FROM product WHERE id = ".$id;

        // ici j'execute ma requete sql ($sql) et je stock le resultat de cette requete dans $pdoStatement
        $pdoStatement = $this->db->query($sql);

        // Je veux récuperer UN objet Product, PDO le fait pour moi => fetchObject (fetch qu'une seule fois + converti en objet de la classe 'Product' donc le model Product)
        $product = $pdoStatement->fetchObject(Product::class); // Product::class pour mettre le chemin complet (namespace + nomdeclasse)

        return $product;
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
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get the value of picture
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * Get the value of category_id
     */
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * Get the value of type_id
     */
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;
    }
}