<?php

namespace Controllers;
use Controller;

require_once "Controller.php";

class PostController extends Controller
{
    public function create()
    {
        $this->authenticationFilter();
    }
}