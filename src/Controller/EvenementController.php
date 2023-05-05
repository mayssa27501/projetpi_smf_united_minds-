<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Entity\Membre;
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


#[Route('/evenement')]
class EvenementController extends AbstractController
{


    #[Route('/front', name: 'app_Evenement_Front', methods: ['GET'])]
    
    public function Front(EntityManagerInterface $entityManager): Response
    {
        $membre = $entityManager->getRepository(Membre::class)->find(1); // normalement connectedUser ( 1 for test)
        $evenements = $entityManager
            ->getRepository(Evenement::class)
            ->findAll();

            $participations = $entityManager
            ->getRepository(Participation::class)
            ->findBy( ['membre' => $membre]);

        return $this->render('evenement/indexFront.html.twig', [
            'evenements' => $evenements,
            'user' => $membre,
            'participations' => $participations,
        ]);
    }


    #[Route('/calendar/loadEvents', name: 'calendar_load_events')]
public function loadEvents(Request $request,EntityManagerInterface $entityManager): JsonResponse
{
    $start = $request->get('start');
    $end = $request->get('end');
    $filters = json_decode($request->get('filters'), true);

    $evenements = $entityManager
    ->getRepository(Evenement::class)
    ->findAll();

    $events = [];

    foreach ($evenements as $evenement) {
        $event = new \stdClass();
        $event->id = $evenement->getIdEvenement();
        $event->title = $evenement->getNom();
        $event->start = $evenement->getDateDebut()->format(\DateTimeInterface::ATOM);
        $event->end = $evenement->getDateFin()->format(\DateTimeInterface::ATOM);
        $events[] = $event;
    }

    return new JsonResponse($events);
}



    #[Route('/', name: 'app_evenement_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $evenements = $entityManager
            ->getRepository(Evenement::class)
            ->findAll();

        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements,
        ]);
    }



    #[Route('/participer/{idEvenement}/{idUser}', name: 'app_evenement_participer', methods: ['GET'])]
    public function reserver(Request $request, $idEvenement, $idUser): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        // Find the Evenement entity with the given id
        $evenement = $entityManager->getRepository(Evenement::class)->find($idEvenement);

        // Find the User entity with the given id
        $user = $entityManager->getRepository(Membre::class)->find($idUser);

        
            // Create a new Participation entity and set its properties
            $participation = new Participation();
            $participation->setEvenement($evenement);
            $participation->setMembre($user);

            // Add the new Participation entity to the database
            $entityManager->persist($participation);
            $entityManager->flush();

            // Return a success response
            return $this->redirectToRoute('app_Evenement_Front', [], Response::HTTP_SEE_OTHER);
 
    }

    #[Route('/annuler-participation/{idEvenement}/{idUser}', name: 'app_evenement_annuler_reservation', methods: ['GET'])]
    public function annulerParticipation(Request $request, $idEvenement, $idUser): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        // Find the Evenement entity with the given id
        $evenement = $entityManager->getRepository(Evenement::class)->find($idEvenement);

        // Find the Membre entity with the given id
        $membre = $entityManager->getRepository(Membre::class)->find($idUser);

        // Find the Participation entity with the given Evenement and Membre
        $participation = $entityManager->getRepository(Participation::class)->findOneBy([
            'evenement' => $evenement,
            'membre' => $membre,
        ]);

        if ($participation) {
            // Remove the Participation entity from the database
            $entityManager->remove($participation);
            $entityManager->flush();

            // Return a success response
            return $this->redirectToRoute('app_Evenement_Front', [], Response::HTTP_SEE_OTHER);
        }

        // If no Participation entity was found, return an error response
        return new Response('No participation found for this user and event.');
    }




    #[Route('/new', name: 'app_evenement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenement->setDateDebut(new \DateTimeImmutable());
            $evenement->setDateFin(new \DateTimeImmutable());
            $entityManager->persist($evenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{idEvenement}', name: 'app_evenement_show', methods: ['GET'])]
    public function show(Evenement $evenement): Response
    {
        return $this->render('evenement/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    #[Route('/{idEvenement}/edit', name: 'app_evenement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Evenement $evenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evenement/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    #[Route('/{idEvenement}', name: 'app_evenement_delete', methods: ['POST'])]
    public function delete(Request $request, Evenement $evenement, EntityManagerInterface $entityManager , MailerInterface $mailer): Response
    {
        
        $participations = $evenement->getParticipations();
        $memberEmails = [];
    
        foreach ($participations as $participation) {
            $member = $participation->getMembre();
            $memberEmails[] = $member->getEmail();
        }



        if ($this->isCsrfTokenValid('delete'.$evenement->getIdEvenement(), $request->request->get('_token'))) {
            $entityManager->remove($evenement);
            $entityManager->flush();

            foreach ($memberEmails as $email) {
                $email = (new Email())
                    ->from('noreply@example.com')
                    ->to($email)
                    ->subject('Event Cancellation')
                    ->text('Dear member, we regret to inform you that the event has been canceled.');
    
                $mailer->send($email);
            }
        }

        return $this->redirectToRoute('app_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
