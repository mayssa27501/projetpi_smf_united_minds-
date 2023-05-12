<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Membre;
use App\Entity\Categorie;
use App\Entity\Participation;
use App\Form\EvenementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Psr\Log\LoggerInterface;
use Twilio\Rest\Client;

#[Route('/api')]
class APIController extends AbstractController
{
    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    #[Route('/evenement', name: 'events', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {        
        $entityManager = $this->getDoctrine()->getManager();
        $evenements = $entityManager->getRepository(Evenement::class)->findAll();

        $responseArray = array();
        foreach ($evenements as $evenement) {
            $responseArray[] = array(
                'id' => $evenement->getIdEvenement(),
                'nom' => $evenement->getNom(),
                'descriptif' => $evenement->getDescriptif(),
                'image' => $evenement->getImage(),
                'likes' => $evenement->getLikes(),
                'date_debut' => $evenement->getDateDebut()->format('Y-m-d'),
                'date_fin' => $evenement->getDateFin()->format('Y-m-d'),
                'nb_participants' => $evenement->getNbParticipants(),
                'id_categorie' => $evenement->getIdCategorie()->getIdCategorie(),
            );
        }

        $responseData = json_encode($responseArray);
        $response = new Response($responseData);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    #[Route('/evenement/{id}', name: 'evenement_delete', methods: ['DELETE'])]
    public function deleteEvenement(int $id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);

        if (!$evenement) {
            throw $this->createNotFoundException('The evenement does not exist');
        }

        $entityManager->remove($evenement);
        $entityManager->flush();

        $response = new JsonResponse(['status' => 'deleted'], Response::HTTP_OK);
        return $response;
    }

    #[Route('/evenement/{id}', name: 'evenement_edit', methods: ['PUT'])]
    public function editEvenement(Request $request, $id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $evenement = $entityManager->getRepository(Evenement::class)->find($id);

        if (!$evenement) {
            return new JsonResponse(['status' => 'Faild']);;
        }

        $evenement->setNom($request->request->get('nom'));
        $evenement->setDescriptif($request->request->get('descriptif'));
        $evenement->setImage($request->request->get('image'));
        $evenement->setLikes($request->request->getInt('likes'));
        $evenement->setDateDebut(new \DateTime($request->request->get('date_debut')));
        $evenement->setDateFin(new \DateTime($request->request->get('date_fin')));
        $evenement->setNbParticipants($request->request->getInt('nb_participants'));
        $idCategorie = $request->request->getInt('id_categorie');
        $categorie = $entityManager->getRepository(Categorie::class)->find($idCategorie);
        $evenement->setIdCategorie($categorie);
        $entityManager->persist($evenement);
        $entityManager->flush();

        $response = new JsonResponse(['status' => 'edited'], Response::HTTP_OK);
        return $response;
    }
    
    #[Route('/evenement/add', name: 'evenement_add', methods: ['GET', 'POST'])]
    public function addEvenement(Request $request): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $evenement = new Evenement();
        $evenement->setNom($request->request->get('nom'));
        $evenement->setDescriptif($request->request->get('descriptif'));
        $evenement->setImage($request->request->get('image'));
        $evenement->setLikes($request->request->getInt('likes'));
        $evenement->setDateDebut(new \DateTime($request->request->get('date_debut')));
        $evenement->setDateFin(new \DateTime($request->request->get('date_fin')));
        $evenement->setNbParticipants($request->request->getInt('nb_participants'));
        $idCategorie = $request->request->getInt('id_categorie');
        $categorie = $entityManager->getRepository(Categorie::class)->find($idCategorie);
        $evenement->setIdCategorie($categorie);

        $entityManager->persist($evenement);
        $entityManager->flush();
        $sid    = "AC7d68b2dbcd247a3d315f9be8e1148c36";
        $token  = "b25fca76fa64bd07607837d98834355d";
            // Send SMS notification using Twilio
            $sid = 'AC7d68b2dbcd247a3d315f9be8e1148c36';
            $token = 'b25fca76fa64bd07607837d98834355d';
            $twilioNumber = '+12707705385'; // Enter your Twilio phone number here
        
            $client = new Client($sid, $token);
            $message = $client->messages->create(
                '+21651730540', // Enter the recipient's phone number here
                [
                    'from' => $twilioNumber,
                    'body' => 'Votre evenement a ete approuvée.'
                ]
            );
        $response = new JsonResponse(['status' => 'added'], Response::HTTP_CREATED);
        return $response;
    }

    #[Route('/categorie', name: 'categorie', methods: ['GET'])]
    public function indexCat(EntityManagerInterface $entityManager): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Categories = $entityManager->getRepository(Categorie::class)->findAll();

        $responseArray = array();
        foreach ($Categories as $Categorie) {
            $responseArray[] = array(
                'idCategorie' => $Categorie->getIdCategorie(),
                'nom' => $Categorie->getNom(),
                'descriptif' => $Categorie->getDescriptif()
            );
        }

        $responseData = json_encode($responseArray);
        $response = new Response($responseData);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    #[Route('/categorie/{id}', name: 'categorie_delete', methods: ['DELETE'])]
    public function deleteCategorie($id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Categorie = $entityManager->getRepository(Categorie::class)->find($id);

        if (!$Categorie) {
            throw $this->createNotFoundException('The evenement does not exist');
        }

        $entityManager->remove($Categorie);
        $entityManager->flush();

        $response = new JsonResponse(['status' => 'deleted'], Response::HTTP_OK);
        return $response;
    }

    #[Route('/categorie/{id}', name: 'categorie_edit', methods: ['PUT'])]
    public function editCategorie(Request $request, $id): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Categorie = $entityManager->getRepository(Categorie::class)->find($id);

        if (!$Categorie) {
            return new JsonResponse(['status' => 'Faild']);;
        }

        $Categorie->setNom($request->request->get('nom'));
        $Categorie->setDescriptif($request->request->get('descriptif'));

        $entityManager->persist($Categorie);
        $entityManager->flush();

        $response = new JsonResponse(['status' => 'edited'], Response::HTTP_OK);
        return $response;
    }
    
    #[Route('/categorie/add', name: 'categorie_add', methods: ['GET', 'POST'])]
    public function addCategorie(Request $request): JsonResponse
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cat = new Categorie();
        $cat->setNom($request->request->get('nom'));
        $cat->setDescriptif($request->request->get('descriptif'));

        $entityManager->persist($cat);
        $entityManager->flush();

        $response = new JsonResponse(['status' => 'added'], Response::HTTP_CREATED);
        return $response;
    }
}
