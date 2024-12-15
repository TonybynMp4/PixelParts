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
        $popularProducts = new Product();
        $filters = [
            [
                'name' => 'rate',
                'condition' => '>=',
                'value' => 4,
            ]
        ];
        $popularProducts = $popularProducts->getWithFilters($filters, 4);
        $data = [
            'popularProducts' => $popularProducts
        ];

        $this->render('home', $data);
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
            $filters = array_filter([
                $search ? [
                    'name' => 'name',
                    'value' => $search,
                    'condition' => 'LIKE'
                ] : null,
                $brand_id ? [
                    'name' => 'brand_id',
                    'value' => $brand_id
                ] : null,
                $type_id ? [
                    'name' => 'type_id',
                    'value' => $type_id
                ] : null,
                $category_id ? [
                    'name' => 'category_id',
                    'value' => $category_id
                ] : null
            ]);
            $products = $products->getWithFilters($filters);
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
        $filters = [
            [
                'name' => 'brand_id',
                'value' => $product->getBrand_id(),
            ],
            [
                'name' => 'category_id',
                'value' => $product->getCategory_id(),
            ],
            [
                'name' => 'type_id',
                'value' => $product->getType_id(),
            ],
            [
                'name' => 'id',
                'condition' => '!=',
                'value' => $product->getId(),
            ]
        ];

        $similarProducts = $similarProducts->getWithFilters($filters, 5);

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
