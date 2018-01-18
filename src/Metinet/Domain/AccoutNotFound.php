<?php

namespace Metinet\Domain\Account;



class AccoutNotFound extends \Exception
{
    public function __construct($email)
    {
        parent::__construct(sprintf('Account with email "%s" not found.', $email));
    }
}