<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[Route('/user')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET','POST'])]
    public function index(EntityManagerInterface $entityManager,UserRepository $userRepository, Request $request): Response
    {
      
            
        $users = $entityManager
            ->getRepository(User::class)
            ->findAll();

        $back = null;
        if($request->isMethod("POST")){
            if ( $request->request->get('optionsRadios')){
                $SortKey = $request->request->get('optionsRadios');
                switch ($SortKey){
                    case 'Cin':
                        $users = $userRepository->SortByCin();
                        break;

                    case 'Nom':
                        $users = $userRepository->SortByNom();
                        break;

                    case 'Telephone':
                        $users = $userRepository->SortByTelephone();
                        break;


                }
            }
            else
            {
                $type = $request->request->get('optionsearch');
                $value = $request->request->get('Search');
                switch ($type){
                    case 'Cin':
                        $users = $userRepository->findByCin($value);
                        break;

                    case 'Nom':
                        $users = $userRepository->findByNom($value);
                        break;


                    case 'Telephone':
                        $users = $userRepository->findByTelephone($value);
                        break;
                    case 'id':
                         $users = $userRepository->findByid($value);
                         break;
                    

                }
            }

            if ( $users){
                $back = "success";
            }else{
                $back = "failure";
            }
        }

        return $this->render('user/index.html.twig', [
            'users' => $users, 'back'=>$back
        ]);
    }
    // add user with json
    #[Route('/addUserMobile', name: 'app_user_addMobile', methods: ['POST'])]
    public function addUserMobile(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, SerializerInterface $serializer): Response
    {
        $user = new User();
        $user->setEmail($request->get('email'));
        $user->setPassword($request->get('password'));
        $user->setRoles($request->get('roles'));
        $user->setCin($request->get('cin'));
        $user->setNom($request->get('nom'));
        $user->setPrenom($request->get('prenom'));
        $user->setTelephone($request->get('telephone'));
        $entityManager->persist($user);
        $entityManager->flush();
        $jsonContent = $serializer->serialize($user, 'json', ['groups' => 'users']);
        return new JsonResponse("user added successfully" . json_encode($jsonContent));
    }

    /** get all user with json **/
    #[Route('/mobileAll', name: 'app_user_indexMobile', methods: ['GET'])]
      public function indexMobile(UserRepository $userRepository, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
      {
      $users = $userRepository->findAll();
      $serializedUsers = $serializer->serialize($users, 'json', ['groups' => 'users']);
      return new JsonResponse($serializedUsers);
     }

    

    /** edit user mobile json */
    #[Route('/{id}/editUserMobile', name: 'app_user_edit_mobile', methods: ['PUT'])]
     public function editUserMobile(SerializerInterface $serializer, Request $request, User $user, UserRepository $userRepository): Response
     {
     $em = $this->getDoctrine()->getManager();
     $user = $em->getRepository(User::class)->find($request->get('id'));
     $user->setUsername($request->get('username'));
     $user->setEmail($request->get('email'));
     $em->flush();
     $jsonContent = $serializer->serialize($user, 'json', ['groups' => 'users']);

     return new JsonResponse("user updated successfully" . json_encode($jsonContent));

     }
     
    /** edit Admin mobile json */


    #[Route('/{id}/editAdminMobile', name: 'app_admin_edit_mobile', methods: ['GET', 'POST', 'PUT'])]
      public function editAdminMobile(SerializerInterface $serializer, Request $request, User $user, UserRepository $userRepository): Response
      {
      $form = $this->createForm(EdituserTypeformType::class, $user);
      $form->handleRequest($request);
     
      if ($form->isSubmitted() && $form->isValid()) {
      $userRepository->save($user, true);
      return $this->redirectToRoute('app_admin_back', [], Response::HTTP_SEE_OTHER);
     
      }
     
      $data = [
      'user' => $user,
      'form' => $form,
      ];
     
      $serializedData = $serializer->serialize($data, 'json');
     
      return new Response($serializedData, Response::HTTP_OK, [
      'Content-Type' => 'application/json'
      ]);
      }
    /** delete user mobile json */
   #[Route('/{id}/deletemobile', name: 'app_deletemobile', methods: ['DELETE'])]
     public function deleteMobile(Request $request, User $user, UserRepository $userRepository): Response
     {
     if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
     $userRepository->remove($user, true);
     return new JsonResponse(['success' => true]);
     }
    
     return new JsonResponse(['success' => false]);
     }
    /** show by id json */
    #[Route('/{id}/mobile', name: 'app_user_showMobile', methods: ['GET'])]
     public function showMobile(User $user, SerializerInterface $serializer): JsonResponse
      {
      $serializedUser = $serializer->serialize($user, 'json', ['groups' => 'users']);
      return new JsonResponse($serializedUser);
      }

    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, UserRepository $userRepository): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);
            
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user, true);
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
    /*
    #[Route('/activer/{id}', name: 'app_activer')]
    public function activer(ManagerRegistry $doctrine, $id)
    {
        $user = $doctrine->getRepository(User::class)->find($id);
        $user->setEtatCompte(1);
        $entityManager = $doctrine->getManager();

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index');
    }
    #[Route('/desactiver/{id}', name: 'app_desactiver')]
    public function desactivert(ManagerRegistry $doctrine, $id)
    {
        $user = $doctrine->getRepository(User::class)->find($id);
        $user->setEtatCompte(0);
        $entityManager = $doctrine->getManager();

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index');
    }*/
    #[Route('/block/{id}', name: 'app_user_block', methods: ['GET', 'POST'])]
    public function block(Request $request, User $user, UserRepository $userRepository): Response
    {
        $user->setIsBlocked(true);
        $userRepository->save($user, true);
       // $user->setEtat("l utlisateur est bloque");
        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    //unblock user by id
    #[Route('/unblock/{id}', name: 'app_user_unblock', methods: ['GET', 'POST'])]
    public function unblock(Request $request, User $user, UserRepository $userRepository): Response
    {
        $user->setIsBlocked(false);
        $userRepository->save($user, true);
       // $user->setEtat("l utilisateur est debloque");
        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }
    
}

