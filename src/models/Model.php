<?php

namespace App\Models;
use PDO;

class Model {
    protected $db;
    protected $id;
    protected $created_at;
    protected $updated_at;

    public function __construct() {
        // Connexion à la base de données via PDO
        $host = 'localhost';
        $dbname = 'pixelparts';
        $user = 'pixelparts';
        $pass = 'test';


        try {
            $this->db = new PDO(
                "mysql:host={$host};dbname={$dbname};charset=utf8",
                $user,
                $pass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUpdated_at() {
        return $this->updated_at;
    }

    public function setUpdated_at($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getCreated_at() {
        return $this->created_at;
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }
}