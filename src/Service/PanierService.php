<?php

// src/Service/PanierService.php
namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierService
{
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function ajouterPlat(int $id)
    {
        // Վերադարձնում ենք 'panier' սեսիայի տվյալները կամ սկիզբի վիճակն empty array
        $panier = $this->session->get('panier', []);

        // Проверка, если элемент уже существует в корзине
        if (!isset($panier[$id])) {
            $panier[$id] = 1;  // Ավելացնում ենք, եթե ոչինչ չկա
        } else {
            $panier[$id]++;  // Բարձրացնում ենք քանակը, եթե արդեն կա
        }

        // Ավելացնում ենք նորացված տվյալները սեսիայում
        $this->session->set('panier', $panier);
    }
}
