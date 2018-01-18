<?php
/**
 * Created by PhpStorm.
 * User: lp
 * Date: 18/01/2018
 * Time: 10:15
 */



namespace Metinet\Domain\Account;
interface AccountRepository
{

    public function get($email): Account;


}