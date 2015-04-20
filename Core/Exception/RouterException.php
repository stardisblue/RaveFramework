<?php

namespace Rave\Core\Exception;

class RouterException extends \Exception
{
	const ERROR_CODE = 1;
	
    public function __construct($message)
    {
        parent::__construct($message, self::ERROR_CODE);
    }

}