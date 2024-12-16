<?php
use App\Models\Product;

class CartController extends MainController
{
    public function cart()
    {
        $cart = $_SESSION['cart'] ?? [];
        $products = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = new Product();
            $product = $product->find($id);
            if ($product) {
                $products[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
                $total += $product->getPrice() * $quantity;
            }
        }

        $data = [
            'products' => $products,
            'total' => $total,
        ];

        $this->render('cart', $data);
    }

    public function addToCart()
    {
        $id = $_GET['id'] ?? null;
        $product = new Product();
        $product = $product->find($id);

        if (!$product) {
            $this->notFound();
            return;
        }

        $cart = $_SESSION['cart'] ?? [];
        $cart[$product->getId()] = 1;
        $_SESSION['cart'] = $cart;

        header('Location: /cart');
    }

    public function updateQuantity()
    {
        $id = $_GET['id'] ?? null;
        $quantity = $_GET['quantity'] ?? null;

        if ($id === null || $quantity === null) {
            $this->notFound();
            return;
        }

        $cart = $_SESSION['cart'] ?? [];
        $cart[$id] = $quantity;
        $_SESSION['cart'] = $cart;

        header('Location: /cart');
    }

    public function removeFromCart()
    {
        $id = $_GET['id'] ?? null;

        if ($id === null) {
            $this->notFound();
            return;
        }

        $cart = $_SESSION['cart'] ?? [];
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;

        header('Location: /cart');
    }

    public function empty()
    {
        $_SESSION['cart'] = [];

        header('Location: /cart');
    }

    public function validate()
    {
        $_SESSION['cart'] = [];

        $this->home();
    }
}
