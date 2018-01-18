<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 10:23
 */

class Connexion
{
    private $email;
    private $password;

    /**
     * Connexion constructor.
     * @param $email
     * @param $password
     */
    public function __construct( Account $email,Account $password)
    {
        $this->email = $email;
        $this->password = $password;
    }


    function connect()
    {
        if(!isset($_SESSION[$this->email])){
            $_SESSION[$this->email];
        }else{
            $_SESSION[$this->email];
        }
    }

}