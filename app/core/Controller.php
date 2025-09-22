<?php

// Classe base para todos os controllers
class Controller
{
    // protected garante que apenas os filhos podem utilizar esta função
    protected function view($view, $viewData = [])
    {
        //Transforma um array em um formato em que haja variavel e valor. $indice='valor'
        extract($viewData);

        $viewFile = __DIR__ . '/../views/' . $view . '.php';

        // Tratamento do erro
        if (!file_exists($viewFile)) {
            throw new Exception("View file not found: " . $viewFile);
        }
        require_once $viewFile;
    }
}
