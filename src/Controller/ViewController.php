<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    #[Route('/view', name: 'view')]
    public function index(): Response
    {
        $tag = date("l");

        $user = [
            'name' => 'Julian',
            'nachname' => 'Fuchs',
            'alter' => '28'
        ];

        $a = array("Apfel", "Birne", "Banane");

        return $this->render('view/index.html.twig', [
            'd' => $tag,
            'user' => $user,
            'a' => $a
        ]);
    }
}
