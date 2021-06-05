<?php

function controllers_autoload($classname)
{
    if (file_exists('controller/' . $classname . '.php')) {
        require_once('controller/' . $classname . '.php');
    } else {
        echo "error al cargar la clase";
    }
}

spl_autoload_register('controllers_autoload');
