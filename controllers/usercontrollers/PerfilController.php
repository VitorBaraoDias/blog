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
    public function upload($id)
    {
        $this->verifyId($id);
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
            $upload_dir = 'public/uploads/';
            $tmp_name = $_FILES['profile_image']['tmp_name'];
            $file_ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $file_name = time() . '.' . $file_ext; // Nome do arquivo com timestamp
            $upload_file = $upload_dir . $file_name;

            // Verifica se o diretório de upload existe, se não, cria-o
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            if (move_uploaded_file($tmp_name, $upload_file)) {
                // Atualiza a imagem de perfil do usuário no banco de dados

                $userImage = UserImage::find_by_user_id($id);
                if ($userImage) {
                    $userImage->update_attributes(['path' => $upload_file, 'old_path' => $userImage->path]);
                    //$userImage->path = $upload_file;
                }else{
                    $userImage = new UserImage(['user_id' => $id, 'path' => $upload_file]);
                }
                if ($userImage->is_valid()) {
                    $userImage->save();
                    $this->redirectToRoute('perfil', 'index');
                }
                // Redireciona para a página de perfil
            } else {
                die("Erro ao fazer upload do arquivo.");
            }
        } else {
            $this->errorView();
        }
    }
}