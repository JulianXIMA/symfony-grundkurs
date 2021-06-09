<?php

namespace App\Controller;

use App\Entity\Artikel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtikelController extends AbstractController
{
    #[Route('/artikel', name: 'artikel')]
    public function index(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();

        //Daten zur DB hinzufügen
        //$artikel = new Artikel();
        //$artikel->setTitel("Unser erster Artikel");
        //$em->persist($artikel);
        //$em->flush();
        //$getArtikel = $em->getRepository(Artikel::class)->findAll();

        //Daten aus DB auslesen (wird auch für Löschen benötigt)
        $getArtikel = $em->getRepository(Artikel::class)->findOneBy([
            'id'=>1
        ]);

        //Daten aus DB löschen
        $em->remove($getArtikel);
        $em->flush();

        return $this->render('artikel/index.html.twig', [
            'artikel' => $getArtikel,
        ]);

        //return new Response("Artikel wurde angelegt");
    }
}
