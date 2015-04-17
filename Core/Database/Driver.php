<?php

namespace Rave\Core\Database;

interface Driver {
    
    public static function query($statement, array $values = []);
    
    public static function execute($statement, array $values = []);

}
