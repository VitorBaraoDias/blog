<?php
require_once 'Controller.php';
class HomeController extends Controller
{

    public function __construct()
    {
        Auth::startSession();
    }
    public function index(){
        $user = null;
        if (Auth::isAuthenticated()) {
            $userId = Auth::get_session();
            $user = User::find($userId); // Obtém o usuário logado pelo ID
        }
        $this->renderView('home', 'index', ['user' => $user]);
    }
    public function create(){
        $this->renderView('home', 'create',['nota' => 1]);
    }
}