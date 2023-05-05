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
            ->from('palette.place2023@gmail.com')
            ->to($to)
            ->subject('un nouveau article à été ajouté')
            ->text('cher client , je tiens de vous informe q un nouvel article a été ajouté , soyez le bienvenue');
            
             
            $this->mailer->send($email);
      
        // ...
    }
}
?>

