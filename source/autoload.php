<?php

spl_autoload_register(function ($class) {
    $namespace = "Source\\";
    $baseDir = __DIR__  . "/";
    $lenght =  strlen($namespace);

    if (strncmp($namespace, $class, $lenght) !== 0) {
        return;
    }

    $loadClass = substr($class, $lenght);
    $file = $baseDir . str_replace("\\", '/', $loadClass) . ".php";

    if (file_exists($file)) {
        include $file;
    }
});
