<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: ProductController
 * 
 * Automatically generated via CLI.
 */
class ProductController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('ProductModel');
        $this->session = $this->call->library('session');
    }

    private function require_auth()
    {
        $authenticated = !empty($this->session->userdata('product_authenticated'));

        if (!$authenticated) {
            redirect('products/login', false);
            exit;
        }
    }

    private function product_data()
    {
        return [
            'product_name' => trim((string) ($_POST['product_name'] ?? '')),
            'description' => trim((string) ($_POST['description'] ?? '')),
            'price' => trim((string) ($_POST['price'] ?? '')),
            'quantity' => trim((string) ($_POST['quantity'] ?? '')),
        ];
    }

    private function validate_product($data)
    {
        $errors = [];

        if ($data['product_name'] === '') {
            $errors[] = 'Product name is required.';
        } elseif (strlen($data['product_name']) > 100) {
            $errors[] = 'Product name must not exceed 100 characters.';
        }

        if ($data['price'] === '' || !is_numeric($data['price']) || (float) $data['price'] < 0) {
            $errors[] = 'Price must be a non-negative number.';
        }

        if ($data['quantity'] === '' || filter_var($data['quantity'], FILTER_VALIDATE_INT) === false || (int) $data['quantity'] < 0) {
            $errors[] = 'Quantity must be a non-negative whole number.';
        }

        return $errors;
    }

    public function index()
    {
        $this->require_auth();
        $data['products'] = $this->ProductModel->order_by('id', 'DESC');
        $this->call->view('products/index', $data);
    }

    public function create()
    {
        $this->require_auth();
        $data = [
            'product' => $this->product_data(),
            'errors' => [],
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['errors'] = $this->validate_product($data['product']);
            if (empty($data['errors'])) {
                $this->ProductModel->insert($data['product']);
                redirect('products', false);
                exit;
            }
        }

        $this->call->view('products/create', $data);
    }

    public function edit($id)
    {
        $this->require_auth();
        $product = $this->ProductModel->find((int) $id);
        if (!$product) {
            show_404();
        }

        $data = [
            'product' => $product,
            'errors' => [],
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_data = $this->product_data();
            $data['product'] = array_merge($product, $product_data);
            $data['errors'] = $this->validate_product($data['product']);
            if (empty($data['errors'])) {
                $this->ProductModel->update((int) $id, $product_data);
                redirect('products', false);
                exit;
            }
        }

        $this->call->view('products/edit', $data);
    }

    public function delete($id)
    {
        $this->require_auth();
        $product = $this->ProductModel->find((int) $id);
        if (!$product) {
            show_404();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->ProductModel->delete((int) $id);
            redirect('products', false);
            exit;
        }

        $this->call->view('products/delete', ['product' => $product]);
    }
}