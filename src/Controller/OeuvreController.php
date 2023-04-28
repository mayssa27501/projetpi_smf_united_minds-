<?php

namespace App\Controller;

use App\Entity\Oeuvre;
<<<<<<< Updated upstream
=======
use App\Entity\Favoris;
use App\Entity\User;
>>>>>>> Stashed changes
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< Updated upstream
=======
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use App\Entity\PdfGeneratorService;
use App\Service\TwilioClient;
use App\Form\SmsType;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Doctrine\Persistence\ManagerRegistry;
use Twilio\Rest\Client;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;


>>>>>>> Stashed changes

/**
 * @Route("/oeuvre")
 */
class OeuvreController extends AbstractController
{
<<<<<<< Updated upstream
     /**
=======

/**
 * @Route("/favorites", name="favorites")
 */
public function favorites(EntityManagerInterface $entityManager)
{
    $favoris = $entityManager->getRepository(Favoris::class)->findAll();

    return $this->render('oeuvre/favorites.html.twig', [
        'favoris' => $favoris,
    ]);
}






/**
 * @Route("/statistique", name="stats")
 */
public function stat()
{
    $em = $this->getDoctrine()->getManager();
    $oeuvres = $em->getRepository(Oeuvre::class)->findAll();
    
    $colors = [];
    $types = [];
    
    foreach ($oeuvres as $oeuvre) {
        $color = $oeuvre->getCouleur();
        $type = $oeuvre->getType();
        
        if (!isset($colors[$color])) {
            $colors[$color] = 0;
        }
        
        if (!isset($types[$type])) {
            $types[$type] = 0;
        }
        
        $colors[$color]++;
        $types[$type]++;
    }
    
    arsort($colors);
    arsort($types);
    
    $colorData = [];
    foreach ($colors as $color => $count) {
        $colorData[] = [$color, $count];
    }
    
    $typeData = [];
    foreach ($types as $type => $count) {
        $typeData[] = [$type, $count];
    }
    
    $pieChart1 = new PieChart();
    $pieChart1->getData()->setArrayToDataTable(
        array_merge([['couleur', 'nombre']], $colorData)
    );
    $pieChart1->getOptions()->setTitle('Statistiques sur les couleurs des oeuvres');
    $pieChart1->getOptions()->setHeight(1000);
    $pieChart1->getOptions()->setWidth(1400);
    $pieChart1->getOptions()->getTitleTextStyle()->setBold(true);
    $pieChart1->getOptions()->getTitleTextStyle()->setColor('green');
    $pieChart1->getOptions()->getTitleTextStyle()->setItalic(true);
    $pieChart1->getOptions()->getTitleTextStyle()->setFontName('Arial');
    $pieChart1->getOptions()->getTitleTextStyle()->setFontSize(30);
    
    $pieChart2 = new PieChart();
    $pieChart2->getData()->setArrayToDataTable(
        array_merge([['type', 'nombre']], $typeData)
    );
    $pieChart2->getOptions()->setTitle('Statistiques sur les types des oeuvres');
    $pieChart2->getOptions()->setHeight(1000);
    $pieChart2->getOptions()->setWidth(1400);
    $pieChart2->getOptions()->getTitleTextStyle()->setBold(true);
    $pieChart2->getOptions()->getTitleTextStyle()->setColor('green');
    $pieChart2->getOptions()->getTitleTextStyle()->setItalic(true);
    $pieChart2->getOptions()->getTitleTextStyle()->setFontName('Arial');
    $pieChart2->getOptions()->getTitleTextStyle()->setFontSize(30);
    
    return $this->render('stats/stat.html.twig', [
        'piechart1' => $pieChart1,
        'piechart2' => $pieChart2,
    ]);
}


 /**
 * @Route("/sendsms", name="Password_send_sms")
 */

    
    // Send SMS notification to admin
    public function sendSms(Request $request,  EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SmsType::class);

        $form->handleRequest($request);
        $err = " ";
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $num = $data['number'];
            $accountSid = 'AC23c10455ba1e24c96fb6bcc98f9183a0';
            $authToken = 'ca73d2dd53ebcc0b60d9cb40b2d47931';
            $client = new Client($accountSid, $authToken);
            $message = $client->messages->create(
                $num, // replace with admin's phone number
                [
                    'from' => '+16076955652', // replace with your Twilio phone number
                    'body' => 'Bonjour cher client, nous disposons de nouvelle Oeuvres. Merci de nous visiter !', // replace with your message
                ]
            );
            return $this->redirectToRoute('app_oeuvre_index');
        } else {
            $err = "erreur";
        }

        return $this->renderForm('sms/index.html.twig', [

            'form' => $form,
            'err' => $err,
        ]);
    }
    
    /**
>>>>>>> Stashed changes
     * @Route("/front", name="app_oeuvre_Front", methods={"GET"})
     */
    public function Front(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/indexfront.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
        ]);
    }

    /**
<<<<<<< Updated upstream
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
=======
 * @Route("/", name="app_oeuvre_index", methods={"GET","POST"})
 */
public function index(EntityManagerInterface $entityManager,Request $request, OeuvreRepository $oeuvreRepository): Response
{
        $queryBuilder = $entityManager->createQueryBuilder()
        ->select('v')
        ->from(Oeuvre::class, 'v');

  

    // Sorting
    $sort = $request->query->get('sort');
    if ($sort) {
        $queryBuilder->orderBy('v.' . $sort, 'ASC');
    }

 
    
    $searchQuery = $request->query->get('v');

    if ($searchQuery) {
        $oeuvres = $oeuvreRepository->search($searchQuery);
    } else {
        $oeuvres = $oeuvreRepository->findAll();
    }
    $oeuvres= $queryBuilder->getQuery()->getResult();
    return $this->render('oeuvre/index.html.twig', [
        'oeuvres' => $oeuvres,
    ]);
}








    /**
 * @Route("/new", name="app_oeuvre_new", methods={"GET", "POST"})
 */
public function new(ManagerRegistry $doctrine, Request $request, OeuvreRepository $oeuvreRepository,NotifierInterface $notifier ): Response
{
    $oeuvre = new Oeuvre();
    $form = $this->createForm(OeuvreType::class, $oeuvre);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Vérifier si une oeuvre similaire existe déjà
        $existingOeuvre = $oeuvreRepository->findOneBy([
            'type' => $oeuvre->getType(),
            'couleur' => $oeuvre->getCouleur(),
            'prix' => $oeuvre->getPrix(),
            'dimension' => $oeuvre->getDimension(),
        ]);

        if ($existingOeuvre) {
            // Une oeuvre similaire existe déjà, ajouter un message flash
            $this->addFlash('warning', 'Une oeuvre similaire existe déjà.');

            $notifier->send(new Notification('Oeuvre existe deja ', ['browser']));
            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }
        
        // Aucune oeuvre similaire n'existe, ajouter l'oeuvre
        // $oeuvreRepository->add($oeuvre, true);
        $oeuvre = $form->getData();
        $entityManager = $doctrine->getManager();
        $entityManager->persist($oeuvre);
        $entityManager->flush();

        $data='this oeuvre id :'.$oeuvre->getId().'Type :'.$oeuvre->getType().'color:'.$oeuvre->getCouleur().'price:'.$oeuvre->getPrix();
        $QR=$this->generateQrCode($data,$oeuvre->getId());
        $notifier->send(new Notification('Oeuvre ajouté avec succés ', ['browser']));
        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('oeuvre/new.html.twig', [
        'oeuvre' => $oeuvre,
        'form' => $form,
    ]);
}


public function generateQrCode(string $data,int $id)
    {
        
        
        $qr_code = QrCode::create($data)
                 ->setSize(200)
                 ->setMargin(20)
                 ->setForegroundColor(new Color(0, 0, 0))
                 ->setBackgroundColor(new Color(255, 255, 255))
                 ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh);

        $label = Label::create(mt_rand(100000, 999999))
                 ->setTextColor(new Color(1, 0, 0))
                 ->setAlignment(new LabelAlignmentLeft);
        $writer = new PngWriter;
        $result = $writer->write($qr_code,label: $label);
        header("Content-Type: " . $result->getMimeType());

        $result->saveToFile("Oeuvre-".$id.".png");
    }


    /**
     * @Route("/admin/{id}", name="app_oeuvre_show", methods={"GET"})
>>>>>>> Stashed changes
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }
    
    /**
<<<<<<< Updated upstream
     * @Route("/admin/{id}", name="app_oeuvre_showF", methods={"GET"})
=======
     * @Route("/{id}", name="app_oeuvre_showF", methods={"GET"})
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    public function edit(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
=======
    public function edit(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository,NotifierInterface $notifier ): Response
>>>>>>> Stashed changes
    {
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
        }
<<<<<<< Updated upstream

=======
        $notifier->send(new Notification('Oeuvre editer avec succés ', ['browser']));
>>>>>>> Stashed changes
        return $this->renderForm('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_oeuvre_delete", methods={"POST"})
     */
<<<<<<< Updated upstream
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
=======
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository,NotifierInterface $notifier ): Response
>>>>>>> Stashed changes
    {
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $oeuvreRepository->remove($oeuvre, true);
        }
<<<<<<< Updated upstream

        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }
=======
        $notifier->send(new Notification('Oeuvre supprimer avec succés ', ['browser']));
        return $this->redirectToRoute('app_oeuvre_index', [], Response::HTTP_SEE_OTHER);
    }

/**
 * @Route("/search", name="app_oeuvre_search", methods={"GET"})
 */
public function search(Request $request, OeuvreRepository $oeuvreRepository): Response
{
    $searchTerm = $request->query->get('q');

    $oeuvres = $oeuvreRepository->findBySearchTerm($searchTerm);

    return $this->render('oeuvre/search.html.twig', [
        'oeuvres' => $oeuvres,
        'searchTerm' => $searchTerm,
    ]);
}

/**
 * @Route("/{id}/add-to-favorites", name="app_add_to_favorites", methods={"GET", "POST"})
 */
public function addToFavorites(Request $request, Oeuvre $oeuvre, EntityManagerInterface $entityManager): Response
{
    $favori = new Favoris();
    $favori->setIdOeuvre($oeuvre);

    $user = $this->getDoctrine()->getRepository(User::class)->find(1);
    $favori->setIdA($user);

    $entityManager->persist($favori);
    $entityManager->flush();

    return $this->redirectToRoute('app_oeuvre_Front');
}



  

#[Route('/pdf/oeuvre', name: 'generator_service')]
public function pdfEvenement(): Response
{ 
    $oeuvre= $this->getDoctrine()
    ->getRepository(Oeuvre::class)
    ->findAll();



    $html =$this->renderView('pdf/index.html.twig', ['oeuvre' => $oeuvre]);
    $pdfGeneratorService=new PdfGeneratorService();
    $pdf = $pdfGeneratorService->generatePdf($html);

    return new Response($pdf, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="document.pdf"',
    ]);
   
}

   
    

>>>>>>> Stashed changes
}
