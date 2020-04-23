<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{    
    
    /**
     * @Route("/administateur", name="administrateur")
     */
    public function dehashbord(){
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
     * @Route("/", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
           
             return $this->redirectToRoute('med');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

       

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
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
    // public function redirection(){
        
        // $authChecker = $this->container->get('security.authorization_checker');

        // if($authChecker->isGranted('ROLE_ADMIN')){

            // return $this->render('');

        // }elseif ($authChecker->isGranted('ROLE_MEDECIN')) {

            // return $this->render('projets/medecin.html.twig') ;

        // }elseif ($authChecker->isGranted('ROLE_PARTAINER')) {

            // return $this->render('projets/partainer.html.twig');

        // }else {
            // return $this->render('projets/login.html.twig');
        // }
    // }

}
