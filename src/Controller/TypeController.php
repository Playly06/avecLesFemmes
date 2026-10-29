<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TypeRepository;

final class TypeController extends AbstractController
{
    public function __construct(private readonly TypeRepository $repo){

    }
    #[Route('/type/controlller', name: 'app_type_controlller')]
    public function index(): Response
    {
        $types=$this->repo->findAll();
        return $this->render('type_controlller/index.html.twig', [
            'controller_name' => 'TypeControlllerController',
        ]);
    }
}
