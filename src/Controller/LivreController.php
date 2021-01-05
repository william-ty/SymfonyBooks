<?php

namespace App\Controller;

use App\Entity\Livre;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/livre")
 */
class LivreController extends AbstractController
{
    /**
     * @Route("/", name="livre")
     */
    public function index(): Response
    {
        $livres = $this->getDoctrine()
        ->getRepository(Livre::class)
        ->getAll();
        
        return $this->render('livre/index.html.twig', [
            'livres' => $livres,
        ]);
    }

    /**
    * @Route("/{id}", name="livre_show", methods="GET")
    */
    public function show(Livre $livre): Response //? par default la methode 'find()' est appellée
    {
        return $this->render('livre/show.html.twig', ['livre' => $livre]);
    }
}
