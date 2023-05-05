<?php

namespace App\Controller;

use App\Entity\Forum;
use App\Form\ForumType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PdfGeneratorService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;

#[Route('/forum')]
class ForumController extends AbstractController
{



    #[Route('/front/{page?1}/{nbre?6}', name: 'app_Forum_Front', methods: ['GET'])]
    
    public function Front(EntityManagerInterface $entityManager,$page,$nbre,ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Forum::class);
        $nbforum = $repository->count([]);
        // 24
        $nbrePage = ceil($nbforum / $nbre) ;

        $forums = $repository->findBy([], [],$nbre, (intval($page) - 1 ) * $nbre);

        return $this->render('forum/indexFront.html.twig', [
            'forums' => $forums,
            'isPaginated' => true,
            'nbrePage' => $nbrePage,
            'page' => $page,
            'nbre' => $nbre
        ]);
    }



    #[Route('/', name: 'app_forum_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager,Request $request): Response
    {
        $queryBuilder = $entityManager->createQueryBuilder()
            ->select('f')
            ->from(Forum::class, 'f');

      

        // Sorting
        $sort = $request->query->get('sort');
        if ($sort) {
            $queryBuilder->orderBy('f.' . $sort, 'ASC');
        }

        $forums = $queryBuilder->getQuery()->getResult();

        return $this->render('forum/index.html.twig', [
            'forums' => $forums,
        ]);
    }

    #[Route('/new', name: 'app_forum_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,NotifierInterface $notifier): Response
    {
        $forum = new Forum();
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);
        $myDictionary = array(
            "tue", "merde", "pute",
            "gueule",
            "débile",
            "con",
            "abruti",
            "clochard",
            "sang"
        );
        

        if ($form->isSubmitted() && $form->isValid()) {
            $forum->setDateForum(new \DateTimeImmutable());
            $myText = $request->get("forum")['descriptifForum'];
            $badwords = new PhpBadWordsController();
            $badwords->setDictionaryFromArray($myDictionary)
                ->setText($myText);
            $check = $badwords->check();
            dump($check);
            if ($check) {
                $notifier->send(new Notification('Mauvais mot ', ['browser']));
                return $this->redirectToRoute('app_forum_new', [], Response::HTTP_SEE_OTHER); 
            }else{
            $entityManager->persist($forum);
            $titre = $form->get('titreForum')->getData();
            
            
            $forums = $entityManager
            ->getRepository(Forum::class)
            ->findBy(['titreForum'=>$titre]);
           if (empty($forums)) 
           {
            $entityManager->flush();
            
            
            $notifier->send(new Notification('Forum ajouté avec sucées', ['browser']));

            return $this->redirectToRoute('app_forum_index', [], Response::HTTP_SEE_OTHER);
           }
           else 
           {
            $notifier->send(new Notification('Forum existe déja ', ['browser']));
            return $this->redirectToRoute('app_forum_new', [], Response::HTTP_SEE_OTHER);

           }
            }
        }

        return $this->renderForm('forum/new.html.twig', [
            'forum' => $forum,
            'form' => $form,
        ]);
    }
    #[Route('/newF', name: 'app_forum_newF', methods: ['GET', 'POST'])]
    public function newF(Request $request, EntityManagerInterface $entityManager,NotifierInterface $notifier): Response
    {
        $forum = new Forum();
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);
        $myDictionary = array(
            "tue", "merde", "pute",
            "gueule",
            "débile",
            "con",
            "abruti",
            "clochard",
            "sang"
        );
        

        if ($form->isSubmitted() && $form->isValid()) {
            $forum->setDateForum(new \DateTimeImmutable());
            $myText = $request->get("forum")['descriptifForum'];
            $badwords = new PhpBadWordsController();
            $badwords->setDictionaryFromArray($myDictionary)
                ->setText($myText);
            $check = $badwords->check();
            
            if ($check) {
                $notifier->send(new Notification('Mauvais mot ', ['browser']));
                return $this->redirectToRoute('app_forum_newF', [], Response::HTTP_SEE_OTHER); 
            }else{
            $entityManager->persist($forum);
            $titre = $form->get('titreForum')->getData();
            
            
            $forums = $entityManager
            ->getRepository(Forum::class)
            ->findBy(['titreForum'=>$titre]);
           if (empty($forums)) 
           {
            $entityManager->flush();
            
            
            $notifier->send(new Notification('Forum ajouté avec sucées', ['browser']));

            return $this->redirectToRoute('app_Forum_Front', [], Response::HTTP_SEE_OTHER);
           }
           else 
           {
            $notifier->send(new Notification('Forum existe déja ', ['browser']));
            return $this->redirectToRoute('app_forum_newF', [], Response::HTTP_SEE_OTHER);

           }
            }
        }

        return $this->renderForm('forum/newF.html.twig', [
            'forum' => $forum,
            'form' => $form,
        ]);
    }

    #[Route('/{idForum}', name: 'app_forum_show', methods: ['GET'])]
    public function show(Forum $forum): Response
    {
        return $this->render('forum/show.html.twig', [
            'forum' => $forum,
        ]);
    }

    #[Route('/{idForum}/edit', name: 'app_forum_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Forum $forum, EntityManagerInterface $entityManager,NotifierInterface $notifier): Response
    {
        $form = $this->createForm(ForumType::class, $forum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $notifier->send(new Notification('Forum modifié avec sucées', ['browser']));

            return $this->redirectToRoute('app_forum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('forum/edit.html.twig', [
            'forum' => $forum,
            'form' => $form,
        ]);
    }

    #[Route('/{idForum}', name: 'app_forum_delete', methods: ['POST'])]
    public function delete(Request $request, Forum $forum, EntityManagerInterface $entityManager,NotifierInterface $notifier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$forum->getIdForum(), $request->request->get('_token'))) {
            $entityManager->remove($forum);
            $entityManager->flush();
        }
        $notifier->send(new Notification('Forum supprimé avec sucées', ['browser']));

        return $this->redirectToRoute('app_forum_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/pdf/evenement', name: 'generator_service')]
    public function pdfEvenement(): Response
    { 
        $forum= $this->getDoctrine()
        ->getRepository(Forum::class)
        ->findAll();

   

        $html =$this->renderView('mpdf/index.html.twig', ['forum' => $forum]);
        $pdfGeneratorService=new PdfGeneratorService();
        $pdf = $pdfGeneratorService->generatePdf($html);

        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="document.pdf"',
        ]);
       
    }
    #[Route('/dislike/{id}', name: 'dislike_forum')]
    public function dislike(Request $request, Forum $forum)
    {
        $forum->setLikes($forum->getLikes() - 1);
        $this->getDoctrine()->getManager()->flush();
    
        $likeCount = $forum->getLikes();
    
        return $this->json([
            'likeCount' => $likeCount,]);
    }
    
    #[Route('/like/{id}', name: 'like_forum')]
    public function like(Request $request, Forum $forum)
    {
        $forum->setLikes($forum->getLikes() + 1);
        $this->getDoctrine()->getManager()->flush();
    
        $likeCount = $forum->getLikes();
    
        return $this->json([
            'likeCount' => $likeCount,]);
    }
}
