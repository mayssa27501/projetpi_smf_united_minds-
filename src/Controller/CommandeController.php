<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeType;
use App\Repository\CommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< Updated upstream
=======
use Doctrine\ORM\EntityManagerInterface;
>>>>>>> Stashed changes

/**
 * @Route("/commande")
 */
class CommandeController extends AbstractController
{
     /**
     * @Route("/front", name="app_commande_Front", methods={"GET"})
     */
    public function Front(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/indexfront.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="app_commande_index", methods={"GET"})
     */
    public function index(CommandeRepository $commandeRepository): Response
    {
        return $this->render('commande/index.html.twig', [
            'commandes' => $commandeRepository->findAll(),
        ]);
    }

<<<<<<< Updated upstream
    /**
     * @Route("/new", name="app_commande_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CommandeRepository $commandeRepository): Response
    {
        $commande = new Commande();
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande, true);
=======
  /**
 * @Route("/new", name="app_commande_new", methods={"GET", "POST"})
 */
public function new(Request $request, CommandeRepository $commandeRepository): Response
{
    $commande = new Commande();
    $form = $this->createForm(CommandeType::class, $commande);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Vérifier si une commande similaire existe déjà
        $existingCommande = $commandeRepository->findOneBy([
            'adresse' => $commande->getAdresse(),
            'quantite' => $commande->getQuantite(),
            'prixc' => $commande->getPrixc(),
            'id_u'=> $commande->getIdu(),
        ]);

        if ($existingCommande) {
            // Une commande similaire existe déjà, ajouter un message flash
            $this->addFlash('warning', 'Une commande similaire existe déjà.');
>>>>>>> Stashed changes

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

<<<<<<< Updated upstream
        return $this->renderForm('commande/new.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

=======
        // Aucune commande similaire n'existe, ajouter la commande
        $commandeRepository->add($commande, true);

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('commande/new.html.twig', [
        'commande' => $commande,
        'form' => $form,
    ]);
}


>>>>>>> Stashed changes
    /**
     * @Route("/admin/{id}", name="app_commande_show", methods={"GET"})
     */
    public function show(Commande $commande): Response
    {
        return $this->render('commande/show.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/{id}", name="app_commande_showF", methods={"GET"})
     */
    public function showF(Commande $commande): Response
    {
        return $this->render('commande/showfront.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_commande_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        $form = $this->createForm(CommandeType::class, $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commandeRepository->add($commande, true);

            return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('commande/edit.html.twig', [
            'commande' => $commande,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_commande_delete", methods={"POST"})
     */
    public function delete(Request $request, Commande $commande, CommandeRepository $commandeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$commande->getId(), $request->request->get('_token'))) {
            $commandeRepository->remove($commande, true);
        }

        return $this->redirectToRoute('app_commande_index', [], Response::HTTP_SEE_OTHER);
    }
<<<<<<< Updated upstream
=======

    #[Route('/show_in_map/{id}', name: 'app_reservation_map', methods: ['GET'])]
    public function Map( Commande $id,EntityManagerInterface $entityManager ): Response
    {

        $commande = $entityManager
            ->getRepository(Commande::class)->findBy( 
                ['id'=>$id]
            );
        return $this->render('map/api_arcgis.html.twig', [
            'commande' => $commande,
        ]);
    }
>>>>>>> Stashed changes
}
