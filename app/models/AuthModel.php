<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: AuthModel
 * 
 * Automatically generated via CLI.
 */
class AuthModel extends Model {
    protected $table = 'accounts';
    protected $primary_key = 'id';
    protected $fillable = ['username', 'password_hash', 'is_active'];
    protected $guarded = ['id'];

    public function __construct()
    {
        parent::__construct();
    }
}