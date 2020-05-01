<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SeccurityController extends AbstractController
 {   
    /**
     * @Route("/admin", name="admin_home")
     */
    public function dehashbord(){
        return $this->render('user/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/login")
     * @Route("/", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()) {
           
            $authChecker = $this->container->get('security.authorization_checker');

            if($authChecker->isGranted('ROLE_ADMIN')){
   
               return $this->render('user/index.html.twig');
   
            }elseif ($authChecker->isGranted('ROLE_MEDECIN')) {
   
                return $this->render('projets/medecin.html.twig') ;
   
            }elseif ($authChecker->isGranted('ROLE_PARTAINER')) {
   
                return $this->render('projets/partainere.html.twig');
   
            }else {
   
                return $this->render('security/login.html.twig');
            }
        }
         

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

       

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
             'error' => $error
             ]);
    }

    /** 
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
   
    /**
     * @Route("/home/redirect")
     */
    public function redirection(){
        
         $authChecker = $this->container->get('security.authorization_checker');

         if($authChecker->isGranted('ROLE_ADMIN')){

            return $this->render('user/index.html.twig');

         }elseif ($authChecker->isGranted('ROLE_MEDECIN')) {

             return $this->render('projets/medecin.html.twig') ;

         }elseif ($authChecker->isGranted('ROLE_PARTAINER')) {

             return $this->render('projets/partainere.html.twig');

         }else {

             return $this->render('security/login.html.twig');
         }
     }
}
