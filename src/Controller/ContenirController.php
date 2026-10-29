<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ContenirRepository;

final class ContenirController extends AbstractController
{
    public function __construct(private readonly ContenirRepository $repo){

    }
    #[Route('/contenir', name: 'app_contenir')]
    public function index(): Response
    {
        $contenirs=$this->repo->findAll();
        return $this->render('contenir/index.html.twig', [
            'controller_name' => 'ContenirController',
        ]);
    }
}
