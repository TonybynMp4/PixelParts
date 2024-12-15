<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use App\Models\Category;

class MainController
{
    // Page d'accueil
    public function home()
    {
        $this->render('home');
    }

    public function catalog()
    {
        $search = $_GET['search'] ?? null;
        $brand_id = $_GET['brand_id'] ?? null;
        $type_id = $_GET['type_id'] ?? null;
        $category_id = $_GET['category_id'] ?? null;

        if (empty($search) && empty($brand_id) && empty($type_id) && empty($category_id)) {
            $categories = new Category();
            $categories = $categories->findAll();
        } else {
            $products = new Product();
            $products = $products->getWithFilters($search, $brand_id, $type_id, $category_id);
            $Category = new Category();
            $Category = $Category->find($category_id);
        }


        $data = [
            'products' => $products ?? null,
            'category' => $Category ?? null,
            'categories' => $categories ?? null,
            'search' => $search ?? null,
        ];

        $this->render('catalog', $data);
    }

    public function product()
    {
        $id = $_GET['id'] ?? null;
        $product = new Product();
        $product = $product->find($id);

        if (!$product) {
            $this->notFound();
            return;
        }

        $brand = new Brand();
        $brand = $brand->find($product->getBrand_id());

        $similarProducts = new Product();
        $similarProducts = $similarProducts->getWithFilters(null, $product->getBrand_id(), $product->getType_id(), $product->getCategory_id(), 4);
        $similarProducts = array_filter($similarProducts, function ($similarProduct) use ($product) {
            return $similarProduct->getId() !== $product->getId();
        });
        $similarProducts = array_slice($similarProducts, 0, 5);

        $data = [
            'product' => $product,
            'brand' => $brand,
            'similarProducts' => $similarProducts
        ];

        $this->render('product', $data);
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
