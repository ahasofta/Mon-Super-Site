<?php

namespace App\Controller;

use App\Entity\Partenaire;
use App\Form\PartainereType;
use App\Repository\PartenaireRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PartenaireController extends Controller
{

    /**
     * @Route("/admin/update/{id}/partenaire" , name="update_ActionPartenaire")
     * @Route("/admin/new/partenaire", name="create_ActionPartenaire")
     */
    public function actionPartenaire (Request $request, Partenaire $partenaire=NULL, ObjectManager $manger){
        
        if (!$partenaire) {
            $partenaire = new Partenaire();
        }
        
        $form = $this->createForm(PartainereType::class, $partenaire);
        $form->handleRequest($request);  
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manger->persist($partenaire);
            $manger->flush();
            $this->addFlash('succes','l\enregistrement a été bien reçu');
            return $this->redirectToRoute('partenaires_list');
        }elseif($form->isSubmitted() && !$form->isValid()){
            $this->addFlash( 'danger','Reéssaye encore');
        }
        dump($request);
        return $this->render("partenaire/action_form.html.twig",[
            'formPartenaire' => $form->createView(),
            'editMode'=> $partenaire->getId()!==null,
        ]);
    }
    /**
     *@Route("/admin/partenaires/list", name="partenaires_list")
     */
    public function list(PartenaireRepository $rep){
        $partenaireAll = $rep->findAll();

        return $this->render("partenaire/list.html.twig",[
            'partenaires'=>$partenaireAll
        ]);
    }
    /**
     *@Route("/admin/partenaire/{id}/show", name="partenaire_show")
     */
    public function show(Partenaire $partenaire){
        

        return $this->render("partenaire/show.html.twig",[
            'partenaire'=>$partenaire
        ]);
    }
    /**
     * @Route("admin/partenaire/{id}/delete" ,name="partenaire_delete")
     */
    public function delete(Partenaire $partenaire,ObjectManager $manger){

       $manger->remove($partenaire);
       $manger->flush();
       return $this->redirectToRoute("partenaires_list");
    }
}