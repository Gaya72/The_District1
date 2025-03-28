<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CatalogueController extends AbstractController
{
    #[Route('/catalogue', name: 'catalogue')]
    public function index(): Response
    {
        return $this->render('catalogue/plats.html.twig', [
            'controller_name' => 'CatalogueController',
        ]);
    }

     #[Route('/plats', name: 'plats')]
    public function plats(): Response
    {
        return $this->render('plats/index.html.twig'); // Ստուգիր՝ արդյոք այս template-ը կա
    }
}
