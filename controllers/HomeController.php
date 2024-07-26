<?php
require_once 'Controller.php';
class HomeController extends Controller
{

    public function __construct()
    {
        $auth = new Auth();
    }
    public function index(){
        $this->renderView('home', 'index');
    }
    public function create(){
        $this->renderView('home', 'create',['nota' => 1]);
    }
}