<?php

namespace App\Controller;
use App\Entity\PdfGeneratorService;
use App\Entity\Article;
use App\Entity\User;
use App\Form\Article1Type;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use App\Service\MailerService; 
use Symfony\Component\Mime\Email; 
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/article')]
class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article_index', methods: ['GET'])]
    public function index(ArticleRepository $articleRepository,EntityManagerInterface $entityManager,Request $request): Response
    {
        $queryBuilder = $entityManager->createQueryBuilder()
        ->select('f')
        ->from(Article::class, 'f');

    // Sorting
    $sort = $request->query->get('sort');
    if ($sort) {
        $queryBuilder->orderBy('f.' . $sort, 'ASC');
    }

    $articles = $queryBuilder->getQuery()->getResult();

    return $this->render('article/index.html.twig', [
        'articles' => $articles,
    ]);
    }
    #[Route('/lesarticles', name: 'app_article_indexFront', methods: ['GET'])]
    public function indexFront(ArticleRepository $articleRepository): Response
    {
        return $this->render('article/indexFront.html.twig', [
            'articles' => $articleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_article_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArticleRepository $articleRepository,NotifierInterface $notifier,EntityManagerInterface $entityManager,MailerService $mailer,SluggerInterface $slugger = null): Response
    {
        $article = new Article();
        $form = $this->createForm(Article1Type::class, $article);
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
            $photoC = $form->get('image')->getData();
            if ($photoC) {
                $originalImgName = pathinfo($photoC->getClientOriginalName(), PATHINFO_FILENAME);
                $newImgename = $originalImgName . '-' . uniqid() . '.' . $photoC->guessExtension();
    
                if ($slugger) {
                    $safeImgname = $slugger->slug($originalImgName);
                    $newImgename = $safeImgname . '-' . uniqid() . '.' . $photoC->guessExtension();
                }
    
                try {
                    $photoC->move(
                        $this->getParameter('imgb_directory'),
                        $newImgename
                    );
                } catch (FileException $e) {
                    // handle exception if something happens during file upload
                }
                $article->setImage($newImgename);
            }
    
            $myText = $form->get('descriptif_artic')->getData();
            $badwords = new PhpBadWordsController();
            $badwords->setDictionaryFromArray($myDictionary)
                ->setText($myText);
            $check = $badwords->check();
           
            if ($check) {
                $notifier->send(new Notification('Mauvais mot saisir une autre description  ', ['browser']));
                return $this->redirectToRoute('app_article_new', [], Response::HTTP_SEE_OTHER); 
            }else{
            $entityManager->persist($article);
            
            
            $titre = $form->get('titre_artic')->getData();
            $articles = $entityManager
            ->getRepository(Article::class)
            ->findBy(['titre_artic'=>$titre]);
           if (empty($articles)) 
           {
            $entityManager->flush();
            $users=$entityManager->getRepository(User::class)->findAll();
            foreach($users as $user)
            {
                $role=$user->getRole();
                $type=$role->getType();
               if($type=="client")
               { $to=$user->getEmail();
                $mailer->sendEmail($to);}

               
            }
            
            
            $notifier->send(new Notification('Article ajouté avec sucées', ['browser']));

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
           }
           else 
           {
            $notifier->send(new Notification('Article existe déja ', ['browser']));
            return $this->redirectToRoute('app_article_new', [], Response::HTTP_SEE_OTHER);

           }
            }
        }

        return $this->renderForm('article/new.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_show', methods: ['GET'])]
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
    

    #[Route('/{id}/edit', name: 'app_article_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Article $article, ArticleRepository $articleRepository,NotifierInterface $notifier): Response
    {
        $form = $this->createForm(Article1Type::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleRepository->save($article, true);
            $notifier->send(new Notification('Article modifé avec sucées', ['browser']));

            return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('article/edit.html.twig', [
            'article' => $article,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_delete', methods: ['POST'])]
    public function delete(Request $request, Article $article, ArticleRepository $articleRepository,NotifierInterface $notifier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $articleRepository->remove($article, true);
        }
        $notifier->send(new Notification('Article supprimé avec sucées', ['browser']));

        return $this->redirectToRoute('app_article_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/pdf/evenement', name: 'generator_service')]
    public function pdfEvenement(): Response
    { 
        $articles= $this->getDoctrine()
        ->getRepository(Article::class)
        ->findAll();

   

        $html =$this->renderView('pdf/index.html.twig', ['articles' => $articles]);
        $pdfGeneratorService=new PdfGeneratorService();
        $pdf = $pdfGeneratorService->generatePdf($html);

        return new Response($pdf, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="document.pdf"',
        ]);
       
    }
}
