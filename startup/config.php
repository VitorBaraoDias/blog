<?php
require 'vendor/autoload.php';
define('APP_NAME', 'Blog App');
define('INVALID_ACCESS_ROUTE', 'c=auth&a=index');
// config.php
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root:root@localhost/blog',
        )
    );
});
