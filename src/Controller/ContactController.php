<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Sauvegarde dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Création de l'email
            $email = (new Email())
                ->from('ton_email@gmail.com') // Doit être ton adresse Gmail
                ->to('ton_email@gmail.com') // Destinataire (remplace par ton adresse)
                ->replyTo($contact->getEmail()) // Pour répondre à l'expéditeur
                ->subject('Nouveau message de contact')
                ->html("
                    <h2>Vous avez reçu un message</h2>
                    <p><strong>Nom:</strong> {$contact->getName()}</p>
                    <p><strong>Email:</strong> {$contact->getEmail()}</p>
                    <p><strong>Message:</strong></p>
                    <p>{$contact->getMessage()}</p>
                ");

            // Envoi de l'email
            $mailer->send($email);

            // Message flash
            $this->addFlash('success', 'Le message a été envoyé avec succès !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
