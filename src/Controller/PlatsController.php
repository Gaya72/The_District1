<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlatsController extends AbstractController
{
    #[Route('/plats', name: 'plats')] //app_plats er areci plat_index
    public function index(): Response
    {
        //return new Response('plats/index.html.twig');
        return $this->render('plats/index.html.twig', [
            'controller_name' => 'PlatsController',
        ]);
            // 'controller_name' => 'PlatsController',]
        ;
    }
    
}
