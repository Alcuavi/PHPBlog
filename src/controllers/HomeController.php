<?php
namespace App\controllers;

use App\DoctrineManager;
use App\models\entities\User;

class HomeController extends Controller
{
    public function index(DoctrineManager $doctrine){
        $doctrine -> em -> getRepository(User::class)-> find(2);
        $this -> viewManager->renderTemplate("index.view.html");
    }
}