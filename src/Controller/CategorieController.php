<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie', name: 'categorie')]
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'img' => [
                'salle.jpg',
                '2.jpg',
                '5.jpg',
                '1.jpg',
                '6.jpg'
            ]
        ]);
    }
}