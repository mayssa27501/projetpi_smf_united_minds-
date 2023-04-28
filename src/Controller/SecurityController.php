<?php

namespace App\Controller;
use App\Repository\UserRepository;
use Swift_Mailer;
use Swift_Message;
use App\Form\ForgotPasswordType;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    
    /*
    #[Route(path: '/forgot', name: 'forgot')]
    public function forgotPassword(Request $request, UserRepository $userRepository,Swift_Mailer $mailer, TokenGeneratorInterface  $tokenGenerator)
    {
        $form = $this->createForm(ForgotPasswordType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $donnees = $form->getData();//
            $user = $userRepository->findOneBy(['email'=>$donnees]);
            if(!$user) {
                $this->addFlash('danger','cette adresse n\'existe pas');
                return $this->redirectToRoute("forgot");
            }
            $token = $tokenGenerator->generateToken();
            try{
                $user->setResetToken($token);
                $entityManager->persist($user);
                $entityManager->flush();
            }catch(\Exception $e){
                $this->addFlash('warning', $e->getMessage());
                return $this->redirectToRoute('forgot');
            }
            $url = $this->generateUrl('reset_password', array('token' => $token), UrlGeneratorInterface::ABSOLUTE_URL);
            $message = (new Swift_Message('Forgot Password'))
                ->setFrom('
                ')
                ->setTo($user->getEmail())
                ->setBody(
                    "Bonjour, voici le lien pour réinitialiser votre mot de passe : " . $url,
                    'text/plain'
                );
            $mailer->send($message);
            $this->addFlash('message', 'Mail envoyé');
            return $this->redirectToRoute('app_login');
    
        }
        return $this->render('registration/forgot.html.twig', [
            'emailForm' => $form->createView()
        ]);
    }
    #[Route(path: '/reset_password/{token}', name: 'reset_password')]
    public function resetPassword(Request $request, string $token, UserPasswordEncoderInterface $passwordEncoder)
    {
        if($request->isMethod('POST')) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneBy(['reset_token' => $token]);
            if($user === null) {
                $this->addFlash('danger', 'Token Inconnu');
                return $this->redirectToRoute('forgot');
            }
            $user->setResetToken(null);
            $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
            $entityManager->flush();
            $this->addFlash('message', 'Mot de passe mis à jour');
            return $this->redirectToRoute('app_login');
        } else {
            return $this->render('registration/reset.html.twig', ['token' => $token]);
        }
    }*/   

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout()    
    {
        return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
    }
    
   

   
}
