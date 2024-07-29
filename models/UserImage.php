<?php
class UserImage  extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('user')
    );
    protected $old_path;
    static $after_update = ['delete_old_image'];

    public function delete_old_image()
    {
        var_dump($this);
    // Verifica se o caminho antigo é diferente do novo
        if ($this->old_path && $this->old_path !== $this->path) {
            // Apaga o arquivo da imagem antiga
            if (file_exists($this->old_path)) {
                unlink($this->old_path);
            }
        }
    }
}