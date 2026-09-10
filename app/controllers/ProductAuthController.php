<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductAuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('AuthModel');
        $this->session = $this->call->library('session');
    }

    public function login()
    {
        if (!empty($this->session->userdata('product_authenticated'))) {
            redirect('products', false);
            exit;
        }

        $data = [
            'username' => trim((string) ($_POST['username'] ?? '')),
            'error' => null,
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = (string) ($_POST['password'] ?? '');
            $account = $this->AuthModel->find_by('username', $data['username']);
            $account_id = is_array($account) ? ($account['id'] ?? null) : ($account->id ?? null);
            $account_username = is_array($account) ? ($account['username'] ?? '') : ($account->username ?? '');
            $password_hash = is_array($account) ? ($account['password_hash'] ?? '') : ($account->password_hash ?? '');
            $is_active = is_array($account) ? ($account['is_active'] ?? 0) : ($account->is_active ?? 0);

            if ($account
                && (int) $is_active === 1
                && password_verify($password, $password_hash)) {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'product_user_id' => $account_id,
                    'product_username' => $account_username,
                    'product_authenticated' => true,
                ]);
                redirect('products', false);
                exit;
            }

            $data['error'] = 'Invalid username or password.';
        }

        $this->call->view('products/login', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata([
            'product_user_id',
            'product_username',
            'product_authenticated',
        ]);
        redirect('products/login', false);
        exit;
    }
}
