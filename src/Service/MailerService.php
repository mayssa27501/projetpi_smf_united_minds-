<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailerService
{
    
    private $mailer;
    
    
    public function __construct( MailerInterface $mailer)
     {
        
        $this->mailer=$mailer;
     }
    
    public function sendEmail(    $to ): void
    {
        
        $email = (new Email())
            ->from('daly.sioud@esprit.tn')
            ->to($to)
            ->subject('Reset password')
            ->text('See Twig integration for better HTML integration!');
             
            $this->mailer->send($email);
      
        // ...
    }
}