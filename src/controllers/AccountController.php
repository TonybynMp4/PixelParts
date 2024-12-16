<?php
use App\Models\User;

class AccountController extends MainController
{
    // Page "Connexion"
    public function loginPage()
    {
        $this->render('login');
    }

    public function login()
    {
        $email = htmlspecialchars($_POST['email']) ?? null;
        $password = htmlspecialchars($_POST['password']) ?? null;

        if ($email === null || $password === null) {
            $this->render('login', ['error' => 'Veuillez remplir tous les champs']);
            return;
        }

        $user = new User();
        $user = $user->findByEmail($email);

        if (!$user || !password_verify($password, $user->getPassword())) {
            $this->render('login', ['error' => 'Identifiants incorrects']);
            return;
        }

        $_SESSION['user'] = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname()
        ];
        header('Location: /');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }

    // Page "Inscription"
    public function registerPage()
    {
        $this->render('register');
    }

    public function register()
    {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $passwordConfirmation = $_POST['passwordConfirmation'] ?? null;
        $firstname = $_POST['firstname'] ?? null;
        $lastname = $_POST['lastname'] ?? null;

        if ($email === null || $password === null || $passwordConfirmation === null || $firstname === null || $lastname === null) {
            $this->render('register', ['error' => 'Veuillez remplir tous les champs']);
            return;
        }

        if ($password !== $passwordConfirmation) {
            $this->render('register', ['error' => 'Les mots de passe ne correspondent pas']);
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $error = $user->save();

        if ($error[0] !== '00000') {
            $this->render('register', ['error' => 'Erreur lors de l\'inscription']);
            return;
        }

        header('Location: /login');
    }
}
