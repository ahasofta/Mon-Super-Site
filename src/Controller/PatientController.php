<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Form\PatientType;
use App\Repository\PatientRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PatientController extends Controller
{

    /**
     * @Route("/admin/update/{id}/patient" , name="update_ActionPatient")
     * @Route("/admin/new/patient", name="create_ActionPatient")
     */
    public function actionPatient (Request $request, Patient $patient=NULL, ObjectManager $manger){
        
        if (!$patient) {
            $patient = new Patient();
        }
        
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);  
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manger->persist($patient);
            $manger->flush();
            $this->addFlash('succes','l\enregistrement a été bien reçu');
        }else {
            $this->addFlash( 'danger','Reéssaye encore');
        }
        dump($request);
        return $this->render("patient/action_form.html.twig",[
            'formPatient' => $form->createView(),
            'editMode'=> $patient->getId()!==null,
        ]);
    }
    /**
     *@Route("/admin/patients/list", name="patient_list")
     */
    public function list(PatientRepository $rep){
        $patientAll = $rep->findAll();

        return $this->render("patient/list.html.twig",[
            'patients'=>$patientAll
        ]);
    }
    /**
     *@Route("/admin/patient/{id}/show", name="patient_show")
     */
    public function show(Patient $patient){
        

        return $this->render("patient/show.html.twig",[
            'patient'=>$patient
        ]);
    }
    /**
     * @Route("admin/patient/{id}/delete" ,name="patient_delete")
     */
    public function delete(Patient $patient,ObjectManager $manger){

       $manger->remove($patient);
       $manger->flush();
       return $this->redirectToRoute("patient_list");
    }
}