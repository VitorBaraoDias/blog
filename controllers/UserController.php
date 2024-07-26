<?php
require_once 'MainController.php';
class UserController extends MainController
{
    public function __construct()
    {
        parent::__construct(User::class, 'auth');
    }
}