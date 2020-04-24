<?php

namespace App\Controller;

use index;
use App\Repository\MedecinRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PhpParser\Builder\Property;

class AdministController extends Controller
{
    /**
     * @var MedecinRepository
     */
     private $repository;

    public function __construct(MedecinRepository $repository)
    {
      $this->repository=$repository;
    }
    /**
     * @Route("/administrateur" , name="administrateur.medecin.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $properties=$this->repository->findAll();
        return $this->render('administ/index.html.twig', [
          compact('properties')  
        ]);
    }
    /**
     * @Route("/administrateur/{id}" , name="administrateur.medecin.edit")
     * @param Property $property
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Property $repository)
    {
       return $this->render('administ/edit.html.twig', [
            compact('properties')  
          ]);
    }
    
}
