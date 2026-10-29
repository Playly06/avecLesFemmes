<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MembreRepository;

final class MembreController extends AbstractController
{
    public function __construct(private readonly MembreRepository $repo){

    }
    #[Route('/membre', name: 'app_membre')]
    public function index(): Response
    {
        $membres=$this->repo->findAll();
        return $this->render('membre/index.html.twig', [
            'controller_name' => 'MembreController',
        ]);
    }
}
