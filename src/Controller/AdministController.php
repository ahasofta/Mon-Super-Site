<?php

namespace App\Controller;

<<<<<<< HEAD
use index;
use App\Repository\MedecinRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PhpParser\Builder\Property;
=======

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
>>>>>>> ff5ca654aa1edaa135f63e83f201afdd7316b165

class AdministController extends Controller
{
    /**
<<<<<<< HEAD
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
=======
     * @Route("/admin", name="admin_home")
>>>>>>> ff5ca654aa1edaa135f63e83f201afdd7316b165
     */
    public function home()
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
