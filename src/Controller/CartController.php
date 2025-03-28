<?php

namespace App\Controller;

use App\Service\PanierService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{ /**
     * @Route("/add-to-cart/{id}", name="add_to_cart")
     */
    public function addToCart(int $id, PanierService $panierService): Response
    {
        $panierService->ajouterPlat($id);  // Ավելացնում է պարագան կառի մեջ
        return $this->redirectToRoute('cart_show');
    }

    public function showCart(PanierService $panierService): Response
{
    $panier = $this->session->get('panier', []);
    return $this->render('cart/show.html.twig', [
        'panier' => $panier,
    ]);
}
}
