<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/User.php';

class HomeController extends Controller
{
  public function index()
  {
    //Exemplo de dados necessários no modelo
    $user = new User();
    $data = $user->getUserData();

    //Retorna view de home
    $this->view('home/index', $data);

    return;
  }

  public function contact()
  {
    $this->view('home/contact');
  }
}
