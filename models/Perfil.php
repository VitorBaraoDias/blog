<?php
class Perfil extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('user')
    );

    static $validates_presence_of = [
        ['username', 'message' => 'username is required'],
        ['bio', 'message' => 'bio is required'],
    ];
    static $validates_size_of = [
        ['username', 'minimum' => 6, 'too_short' => 'username should be at least 6 characters long'],
        ['bio', 'minimum' => 30, 'too_short' => 'bio should be at least 30 characters long']
    ];
    static $validates_uniqueness_of = [
        ['username', 'message' => 'username is already taken']
    ];
}