<?php
class Auth
{
    public function __construct()
    {
        session_start();
    }

    public static function authenticate($email, $password)
    {
        $authenticated = false;
        $user = User::find_by_email($email);
        if ($user && $user->verify_password($password)) {
            $_SESSION['user'] = $user->id;
            $authenticated = true;
        }
        return $authenticated;
    }
    public function create_session($user){
        $_SESSION['user'] = $user->id;
    }
    public function IsLoggedIn()
    {
        return isset($_SESSION['user']);
    }
    public function Logout()
    {
        session_destroy();
    }
}