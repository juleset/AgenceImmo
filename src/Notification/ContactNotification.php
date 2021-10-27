<?php

namespace App\Notification;

use App\Entity\Contact;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class ContactNotification{

    /**
     * @var MailerInterface
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(MailerInterface $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    /**
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\LoaderError
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function notify (Contact $contact){
        $message = (new Email())
            ->subject('Agence : ' . $contact->getProperty()->getTitle())
            ->from('noreply@example.com')
            ->to('contact@agence.fr')
            ->replyTo($contact->getEmail())
            ->html($this->renderer->render('emails/contact.html.twig', [
                'contact' => $contact
            ]));
        $this->mailer->send($message);
    }
}