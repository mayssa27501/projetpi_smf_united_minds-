<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/oeuvre")
 */
class OeuvreController extends AbstractController
{
     /**
     * @Route("/front", name="app_oeuvre_Front", methods={"GET"})
     */
    public function Front(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/indexfront.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/", name="app_oeuvre_index", methods={"GET"})
     */
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/index.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_oeuvre_new", methods={"GET", "POST"})
     */
    public function new(Request $request, OeuvreRepository $oeuvreRepository): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oeuvre/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oeuvre_show", methods={"GET"})
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }
    
    /**
     * @Route("/admin/{id}", name="app_oeuvre_showF", methods={"GET"})
     */
    public function showF(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/showF.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }
    

    /**
     * @Route("/{id}/edit", name="app_oeuvre_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oeuvre_delete", methods={"POST"})
     */
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $oeuvreRepository->remove($oeuvre, true);
        }

        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
}
