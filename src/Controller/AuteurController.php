<?php

namespace App\Controller;

use App\Entity\Auteur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/auteur")
 */
class AuteurController extends AbstractController
{
    /**
     * @Route("/", name="auteur")
     */
    public function index(): Response
    {
        $auteurs = $this->getDoctrine()
            ->getRepository(Auteur::class)
            ->getAll();

        return $this->render('auteur/index.html.twig', [
            'auteurs' => $auteurs,
        ]);
    }

    /**
     * @Route("/{id}", name="auteur_show", methods="GET")
     */
    public function show(Auteur $auteur): Response //? par default la methode 'find()' est appellée
    {
        return $this->render('auteur/show.html.twig', ['auteur' => $auteur]);
    }
}
