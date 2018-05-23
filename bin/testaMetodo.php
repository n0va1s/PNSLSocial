<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../bootstrap.php';

$obj = new \n0va1s\QuadroMagico\Entity\XXXEntity();
try {
    $obj->setValor('ABC');
    var_dump($obj);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage().'-'.$e->getCode();
}
