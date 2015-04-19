<?php

namespace Rave\Core\Exception;

class IOException extends \Exception
{

    public function __construct($message)
    {
        parent::__construct($message, null, null);
    }

}
