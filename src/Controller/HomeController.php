<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/medecin", name="med")
     */
    public function medecin(){
        return $this->render('projets/medecin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @Route("/partenaire", name="part")
     */
    public function partenaire(){
        return $this->render('projets/partenaire.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
