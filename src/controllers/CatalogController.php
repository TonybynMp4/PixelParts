<?php

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;

class CatalogController extends MainController
{
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
}
