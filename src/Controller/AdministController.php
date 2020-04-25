<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministController extends Controller
{
    /**
     * @Route("/admin", name="admin_home")
     */
    public function home()
    {
        return $this->render('administ/index.html.twig', [
            'controller_name' => 'AdministController',
        ]);
    }
    
    
}
