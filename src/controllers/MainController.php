<?php
use App\Models\Product;

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
    protected function render($view, $data = [])
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
