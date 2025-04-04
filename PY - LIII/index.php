<?php
    require './src/Roots.php';
    require PATH_SRC . 'autoloader/Autoloader.php';
    
    Autoloader::registrar();

    $controller = new IndexController;
    $controller->route();

?>