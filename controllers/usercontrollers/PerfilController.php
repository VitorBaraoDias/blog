<?php
require_once 'controllers/Controller.php';
class PerfilController extends Controller
{
    public function __construct()
    {
        $this->authenticationFilter();
    }

    public function index()
    {
        $user = User::find(Auth::get_session());
        if (!is_null($user)) {
            $this->renderView('perfil', 'index', ['user' => $user]);
        } else {
            $this->errorView();
        }
    }

    public function store()
    {
        $perfil = new Perfil($this->getHTTPPost());

        $this->verifyId($perfil->user_id);
        if ($perfil->is_valid()) {
            $perfil->save();
            $this->redirectToRoute('perfil', 'index');
        } else {
            $this->renderView('perfil', 'index', ['user' => $perfil->user, 'perfil' => $perfil]);
        }
    }

    public function update($id)
    {
        $perfil = Perfil::find_by_id($id);
        if (!is_null($perfil) && $perfil->user_id === Auth::get_session()) {
            $perfil->update_attributes($this->getHTTPPost());
            if ($perfil->is_valid()) {
                $perfil->save();
                $this->redirectToRoute("perfil", "index");

            } else {
                $this->renderView("perfil", "index", ['user' => $perfil->user, 'perfil' => $perfil]);
            }
        }
        $this->errorView();
    }
}