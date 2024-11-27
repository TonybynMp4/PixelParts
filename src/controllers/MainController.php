<?php

class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }

    public function catalog()
    {
        $this->render('catalog');
    }

    public function product()
    {
        $this->render('product');
    }

    public function cart()
    {
        $this->render('cart');
    }

    // Page "Connexion"
    public function login()
    {
        $this->render('login');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }

    // Page "Inscription"
    public function register()
    {
        $this->render('register');
    }

    // Page "About"
    public function about()
    {
        $this->render('about');
    }

    // Page 404
    public function notFound()
    {
        http_response_code(404);
        $this->render('404');
    }

    // Méthode pour inclure une vue
    private function render($view, $data = [])
    {
        // Transmet les données aux vues
        extract($data);

        // Inclut la vue demandée
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "View not found: $view";
        }
    }
}
