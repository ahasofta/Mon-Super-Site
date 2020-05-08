<?php

namespace App\Controller;

use App\Entity\Medecin;
use App\Form\MedecinType;
use App\Repository\MedecinRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MedecinController extends Controller
{

    /**
     * @Route("/admin/update/{id}/medecin" , name="update_ActionMedecin")
     * @Route("/admin/new/medecin", name="create_ActionMedecin")
     */
    public function actionMedcin (Request $request, Medecin $medecin=NULL, ObjectManager $manger){
        
        if (!$medecin) {
            $medecin = new Medecin();
        }
        
        $form = $this->createForm(MedecinType::class, $medecin);
        $form->handleRequest($request);  
        if ($form->isSubmitted() && $form->isValid()){

                $this->addFlash('succes','l\'enregistrement a été bien reçu');
                $manger->persist($medecin);
                $manger->flush();
                return $this->redirectToRoute('medecins_list');
            }elseif($form->isSubmitted() && !$form->isValid()){
                $this->addFlash( 'danger','Reéssaye encore!!');
            }
       
        dump($request);
        return $this->render("medecin/action_form.html.twig",[
            'formMedecin' => $form->createView(),
            'editMode'=> $medecin->getId()!==null,
        ]);
    }
    /**
     *@Route("/admin/medecins/list", name="medecins_list")
     */
    public function list(MedecinRepository $rep){
        $medecinAll = $rep->findAll();
       
        return $this->render("medecin/list.html.twig",[
            'medecins'=>$medecinAll
        ]);
    }
    /**
     *@Route("/admin/medecins/{id}/show", name="medecin_show")
     */
    public function show(Medecin $medecin){
        

        return $this->render("medecin/show.html.twig",[
            'medecin'=>$medecin
        ]);
    }
    /**
     * @Route("admin/medecin/{id}/delete" ,name="medecin_delete")
     */
    public function delete(Medecin $medecin,ObjectManager $manger){

       $manger->remove($medecin);
       $manger->flush();
       return $this->redirectToRoute("medecins_list");
    }
}