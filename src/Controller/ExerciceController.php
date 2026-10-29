<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ExerciceRepository;
final class ExerciceController extends AbstractController
{
    public function __construct(private readonly ExerciceRepository $repo){

    }

    #[Route('/exercice', name: 'app_exercice')]
    public function index(): Response
    {
        $exercices=$this->repo->findAll();
        return $this->render('exercice/index.html.twig', [
            'controller_name' => 'ExerciceController',
        ]);
    }
}
