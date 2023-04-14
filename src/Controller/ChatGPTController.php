<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use GuzzleHttp\ClientInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ChatGPTController extends AbstractController
{

    private $chatbot;
    public function __construct(ClientInterface $chatbot)
    {
        $this->chatbot = $chatbot;
    }


    #[Route('/chatgpt', name: 'app_chat_g_p_t')]
    public function index(Request $request): Response
    {
        $response = null;
        $form = $this->createFormBuilder(null)
        ->add('message', TextType::class)
        ->add('submit', SubmitType::class)
        ->getForm();
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $response = $this->chatbot->post('/v1/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer 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',
            ],
            'json' => [
                'model' => 'text-davinci-002',
                'prompt' => $form->get('message')->getData(),
                'temperature' => 0.7,
            ],
        ]);


        $data = json_decode($response->getBody(), true);

        $message = $data['choices'][0]['text'];
        return $this->render('chat_gpt/index.html.twig', [
            'form' => $form->createView(),
            'message' => $message,
        ]);
    }
        return $this->render('chat_gpt/index.html.twig', [
            'controller_name' => 'ChatGPTController',
            'form' => $form->createView(),
            'message' => $response

        ]);
    }
}
