<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
     * @IsGranted("ROLE_MEDECIN")
     * @Route("/medecin", name="med")
     */
    public function medecin(){
        return $this->render('projets/medecin.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    
    /**
     * @IsGranted("ROLE_PARTENAIRE")
     * @Route("/partenaire", name="part")
     */
    public function partenaire(){
        return $this->render('projets/partenaire.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    } 
}
