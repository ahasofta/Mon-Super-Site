<?php

namespace App\Controller;

use App\Entity\Medecin;
use App\Form\MedecinType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('administ/index.html.twig', [
            'controller_name' => 'AdministController',
        ]);
    }
    /**
     * @Route("/admin/new/medecin", name="create_medecin")
     */
    public function ActionMedcin (){
        $medecin = new Medecin();
        $form = $this->createForm(MedecinType::class, $medecin);

        return $this->render("medecin/action.html.twig",[
            'formMedecin' => $form->createView()
        ]);
    }
    
}
