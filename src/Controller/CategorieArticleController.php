<?php

namespace App\Controller;

use App\Entity\CategorieArticle;
use App\Form\CategorieArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie/article')]
class CategorieArticleController extends AbstractController
{

    #[Route('/front', name: 'app_Categorie_Article_Front', methods: ['GET'])]
    
    public function Front(EntityManagerInterface $entityManager): Response
    {
        $categorieArticles = $entityManager
            ->getRepository(CategorieArticle::class)
            ->findAll();

        return $this->render('categorie_article/indexFront.html.twig', [
            'categorieArticles' => $categorieArticles,
        ]);
    }






    #[Route('/', name: 'app_categorie_article_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $categorieArticles = $entityManager
            ->getRepository(CategorieArticle::class)
            ->findAll();

        return $this->render('categorie_article/index.html.twig', [
            'categorie_articles' => $categorieArticles,
        ]);
    }

    #[Route('/new', name: 'app_categorie_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categorieArticle = new CategorieArticle();
        $form = $this->createForm(CategorieArticleType::class, $categorieArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categorieArticle);
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_article/new.html.twig', [
            'categorie_article' => $categorieArticle,
            'form' => $form,
        ]);
    }

    #[Route('/{idCatArtic}', name: 'app_categorie_article_show', methods: ['GET'])]
    public function show(CategorieArticle $categorieArticle): Response
    {
        return $this->render('categorie_article/show.html.twig', [
            'categorie_article' => $categorieArticle,
        ]);
    }

    #[Route('/{idCatArtic}/edit', name: 'app_categorie_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieArticle $categorieArticle, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategorieArticleType::class, $categorieArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_categorie_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_article/edit.html.twig', [
            'categorie_article' => $categorieArticle,
            'form' => $form,
        ]);
    }

    #[Route('/{idCatArtic}', name: 'app_categorie_article_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieArticle $categorieArticle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieArticle->getIdCatArtic(), $request->request->get('_token'))) {
            $entityManager->remove($categorieArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_categorie_article_index', [], Response::HTTP_SEE_OTHER);
    }
}
