<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
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
        if (!empty($this->session->userdata('user_id'))) {
            redirect('products', false);
            exit;
        }

        $data = [
            'username' => trim((string) $this->io->post('username', '')),
            'password' => (string) $this->io->post('password', ''),
            'error' => null,
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $account = $this->AuthModel->find_by('username', $data['username']);

            if ($account && (int) $account['is_active'] === 1 && password_verify($data['password'], $account['password_hash'])) {
                $this->session->regenerate_on_login();
                $this->session->set_userdata([
                    'user_id' => $account['id'],
                    'username' => $account['username'],
                    'logged_in' => true,
                ]);
                redirect('products', false);
                exit;
            }

            $data['error'] = 'Invalid username or password.';
        }

        $this->call->view('auth/login', $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', false);
        exit;
    }
}