<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(): Response
    {
        // Format de la date la plus récente
        $currentDate = date('d/m/Y H:i:s');

        return $this->render('accueil/index.html.twig', [
            'current_date' => $currentDate,
        ]);
    }
}
