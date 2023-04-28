<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayzoneController extends AbstractController
{
    #[Route('/playzone', name: 'app_playzone')]
    public function index(): Response
    {
        return $this->render('playzone/index.html.twig', [
            'controller_name' => 'PlayzoneController',
        ]);
    }
}
