<?php

namespace Gregorio\App;

class View
{

    public static function render(string $view, $model)
    {
        require __DIR__ . '/../View/Partial/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/Partial/footer.php';
    }

    public static function redirect(string $url){
        header("Location: $url");
        exit();
    }

}