<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class AppBunndleSecurityController extends Controller
{
    /**
     * @Route("/app/bunndle/security", name="app_bunndle_security")
     */
    public function index()
    {
        return $this->render('app_bunndle_security/index.html.twig', [
            'controller_name' => 'AppBunndleSecurityController',
        ]);
    }
}
