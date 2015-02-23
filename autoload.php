<?php
// Configurações de conexão com o banco de dados
define("HOST", "localhost");
define("DBNAME", "cursopoo");
define("USER", "root");
define("PASS", "root");

// Configurações do autoload
define("CLASS_DIR", __DIR__ . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR);

spl_autoload_register(function($class) {
    $className = CLASS_DIR . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    include($className);
});
