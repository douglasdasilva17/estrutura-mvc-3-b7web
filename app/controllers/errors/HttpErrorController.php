<?php

namespace App\Controllers\Errors;

use App\Core\Controller;

class HttpErrorController extends Controller
{
    // Erro para indicar que o arquivo não existe
    public function notFoundError()
    {
        http_response_code(404);
        $this->view("errors/404");
    }

    //Erro interno de servidor
    public function internalServerError()
    {
        http_response_code(500);
        $this->view('errors/500');
    }

    // Erro de acesso não autorizado
    public function unauthorizedAccessError()
    {
        http_response_code(403);
        $this->view('errors/403');
    }
}
