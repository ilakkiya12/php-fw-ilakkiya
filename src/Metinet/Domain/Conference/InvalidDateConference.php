<?php
/**
 * @author Boris Guéry <guery.b@gmail.com>
 */

namespace Metinet\Domain;

class InvalidDateConference extends \Exception
{
    public static function mustNotBeInThePast(): self
    {
        return new self('Date Of Event cannot be in the past');
    }
}
