<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends Controller
{
    
    /**
     * @Route("/admin/update/{id}/user" , name="update_ActionUser")
     * @Route("/admin/new/user", name="create_ActionUser")
     */
    public function actionUser (Request $request, User $user=NULL, ObjectManager $manger,UserPasswordEncoderInterface $encoder){
        
        if (!$user) { 
            $user= new User();
        }
        
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);  
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('succes','l\enregistrement a été bien reçu');
            $passwordHash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordHash);
            $manger->persist($user);
            $manger->flush();
            return $this->redirectToRoute('users_list');
            
        }elseif($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash( 'danger','Reéssaye encore!!');
        }
        dump($request);
        return $this->render("user/action_form.html.twig",[
            'formUser' => $form->createView(),
            'editMode'=> $user->getId()!==null,
        ]);
    }
    /**
     *@Route("/admin/users/list", name="users_list")
     */
    public function list(){
        $rep = $this->getDoctrine()->getRepository(User::class);
        $userAll = $rep->findAll();

        return $this->render("user/list.html.twig",[
            'users'=>$userAll
        ]);
    }
    /**
     *@Route("/admin/users/{id}/show", name="user_show")
     */
    public function show(User $user){
        

        return $this->render("user/show.html.twig",[
            'user'=>$user
        ]);
    }
    /**
     * @Route("admin/user/{id}/delete" ,name="user_delete")
     */
    public function delete(User $user,ObjectManager $manger){

       $manger->remove($user);
       $manger->flush();
       return $this->redirectToRoute("users_list");
    }
    
}
