<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CampagneRepository;

final class CampagneController extends AbstractController
{
    public function __construct(private readonly CampagneRepository $repo){

    }

    #[Route('/campagne', name: 'app_campagne')]
    public function index(): Response
    {
        $campagnes=$this->repo->findAll();
        return $this->render('campagne/index.html.twig', [
            'controller_name' => 'CampagneController',
        ]);
    }
}
