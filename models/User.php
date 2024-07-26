<?php
class User extends \ActiveRecord\Model
{
    protected $password_confirmation;

    static $accessible = ['email', 'password']; // Não inclui password_confirmation

// Atributos acessíveis para mass assignment
    // Validações
    static $validates_presence_of = [
        ['email', 'message' => 'email is required'],
        ['password', 'message' => 'Password is required'],
    ];

    static $validates_size_of = [
        ['email', 'minimum' => 3, 'too_short' => 'Email should be at least 3 characters long'],
        ['password', 'minimum' => 6, 'too_short' => 'Password should be at least 6 characters long']
    ];

    static $validates_confirmation_of = [
        ['password', 'message' => 'Password confirmation does not match']
    ];

    static $validates_format_of = [
        ['email', 'with' => '/^([a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+)$/', 'message' => 'Email format is invalid']
    ];

    static $validates_uniqueness_of = [
        ['email', 'message' => 'Email is already taken']
    ];
    static $before_save = ['encrypt_password', 'clear_password_confirmation'];

    public function validate()
    {
        if ($this->password != $this->password_confirmation) {
            $this->errors->add('password_confirmation', 'Password confirmation does not match');
        }
    }
    // Criptografar a senha antes de salvar
    public function encrypt_password()
    {
        if (!empty($this->password)) {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        }
    }

    // Limpar confirmação de senha antes de salvar
    public function clear_password_confirmation()
    {
        unset($this->password_confirmation);
    }

    public function verify_password($password)
    {
        return password_verify($password, $this->password);
    }
}