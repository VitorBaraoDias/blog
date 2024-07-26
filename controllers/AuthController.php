<?php
require_once "Controller.php";

class AuthController extends Controller
{
    public function index() {
        $this->renderView('auth', 'index');
    }
    public function create() {
        $this->renderView('auth', 'create');
    }
    public function store()
    {
        $user = new User($this->getHTTPPost());
        if ($user->is_valid()) {
            $user->save();

            $auth = new Auth();
            $auth->create_session($user);
            $this->redirectToRoute('home', "index");
        } else {
            $this->renderView("auth", 'create', ['user' => $user]);
        }
    }
    public function login() {

        $email = $this->getHTTPPostParam('email');
        $password = $this->getHTTPPostParam('password');
        $auth = new Auth();
        if ($auth->authenticate($email, $password)) {
            $this->redirectToRoute('home', 'index');
        } else {
            $errors = ['email' => 'Invalid email or password'];
            $this->renderView('auth', 'index', ['errors' => $errors, 'email' => $email]);
        }
    }
    public function logout(){
        $auth = new Auth();
        $auth->Logout();
        $this->redirectToRoute('home', "index");
    }
}