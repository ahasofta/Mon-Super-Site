<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AdministController extends Controller
{
    /**
     * @Route("/administ", name="administ")
     */
    public function index()
    {
        return $this->render('administ/index.html.twig', [
            'controller_name' => 'AdministController',
        ]);
    }
    
}
