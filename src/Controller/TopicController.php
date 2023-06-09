<?php

namespace App\Controller;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use App\Entity\Topic;
use App\Form\TopicType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/topic')]
class TopicController extends AbstractController
{
    #[Route('/statistique', name: 'stats')]
    public function stat()
        {
    
            $repository = $this->getDoctrine()->getRepository(Topic::class);
    $topics = $repository->findAll();
    $em = $this->getDoctrine()->getManager();
  



    

    $data = array();
    $total=0;
    foreach ($topics as $topic) {
        $forums = $topic->getForums();
        $num_forums = count($forums);
       //$total=$total+$num_reservations*$evenement->getPrix();
       
        $data[] = [$topic->getDescriptifTopic(), $num_forums];
    }
  


   



    $pieChart = new PieChart();
    $pieChart->getData()->setArrayToDataTable(
        array_merge([['Titre', 'Nombre de Forums']], $data)
    );
    $pieChart->getOptions()->setTitle('Statistiques sur les forums');
    $pieChart->getOptions()->setHeight(1000);
    $pieChart->getOptions()->setWidth(1400);
    $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
    $pieChart->getOptions()->getTitleTextStyle()->setColor('green');
    $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
    $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
    $pieChart->getOptions()->getTitleTextStyle()->setFontSize(30);

 



    return $this->render('stats/stat.html.twig', array('piechart' => $pieChart));
        }


    #[Route('/front', name: 'app_Topic_Front', methods: ['GET'])]
    
    public function Front(EntityManagerInterface $entityManager): Response
    {
        $topics = $entityManager
            ->getRepository(Topic::class)
            ->findAll();

        return $this->render('topic/indexFront.html.twig', [
            'topics' => $topics,
        ]);
    }




    #[Route('/', name: 'app_topic_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $topics = $entityManager
            ->getRepository(Topic::class)
            ->findAll();

        return $this->render('topic/index.html.twig', [
            'topics' => $topics,
        ]);
    }

    #[Route('/new', name: 'app_topic_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $topic = new Topic();
        $form = $this->createForm(TopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($topic);
            $entityManager->flush();

            return $this->redirectToRoute('app_topic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('topic/new.html.twig', [
            'topic' => $topic,
            'form' => $form,
        ]);
    }

    #[Route('/{idTopic}', name: 'app_topic_show', methods: ['GET'])]
    public function show(Topic $topic): Response
    {
        return $this->render('topic/show.html.twig', [
            'topic' => $topic,
        ]);
    }

    #[Route('/{idTopic}/edit', name: 'app_topic_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Topic $topic, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TopicType::class, $topic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_topic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('topic/edit.html.twig', [
            'topic' => $topic,
            'form' => $form,
        ]);
    }

    #[Route('/{idTopic}', name: 'app_topic_delete', methods: ['POST'])]
    public function delete(Request $request, Topic $topic, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$topic->getIdTopic(), $request->request->get('_token'))) {
            $entityManager->remove($topic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_topic_index', [], Response::HTTP_SEE_OTHER);
    }
}
