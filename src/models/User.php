<?php
namespace App\Models;

use App\Models\Model;
use PDO; // on utilise la classe PDO dont le namespace a été défini
use PDOException;

class User extends Model
{
    private $email;
    private $password;
    private $firstname;
    private $lastname;

    public function findAll()
    {
        $sql = "SELECT * FROM `user`";
        $pdoStatement = $this->db->query($sql);
        $users = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $users;
    }

    public function find($id)
    {
        $sql = "SELECT * FROM `user` WHERE id = ".$id;
        $pdoStatement = $this->db->query($sql);
        $user = $pdoStatement->fetchObject(Type::class);

        return $user;
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM `user` WHERE email = :email";
        $pdoStatement = $this->db->prepare($sql);
        $pdoStatement->execute([':email' => $email]);
        $user = $pdoStatement->fetchObject(User::class);

        return $user;
    }

    public function save()
    {
        $sql = "INSERT INTO `user` (email, password, firstname, lastname) VALUES (:email, :password, :firstname, :lastname)";
        $pdoStatement = $this->db->prepare($sql);
        $pdoStatement->execute([
            ':email' => $this->email,
            ':password' => $this->password,
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname
        ]);

        return $pdoStatement->errorInfo();
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
}
