<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductAuthMiddleware
{
    public function handle($next)
    {
        $session = load_class('session', 'libraries');

        if (empty($session->userdata('product_authenticated'))) {
            redirect('products/login', false);
            exit;
        }

        return $next();
    }
}
