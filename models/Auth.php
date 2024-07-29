<?php
class Auth
{
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function authenticate($email, $password)
    {
        $authenticated = false;
        $user = User::find_by_email($email);
        if ($user && $user->verify_password($password)) {
            self::startSession();
            $_SESSION['user'] = $user->id;
            $authenticated = true;
        }
        return $authenticated;
    }
    public static function create_session($user){
        self::startSession();
        $_SESSION['user'] = $user->id;
    }
    public static function isAuthenticated()
    {
        self::startSession();
        return isset($_SESSION['user']);
    }
    public static function get_session(){
        self::startSession();
        return $_SESSION['user'];
    }

    public static function Logout()
    {
        self::startSession();
        session_destroy();
    }
}