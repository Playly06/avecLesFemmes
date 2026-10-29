<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\RoleRepository;

final class RoleController extends AbstractController
{
    public function __construct(private readonly RoleRepository $repo){

    }

    #[Route('/role', name: 'app_role')]
    public function index(): Response
    {
        $roles=$this->repo->findAll();
        return $this->render('role/index.html.twig', [
            'controller_name' => 'RoleController',
        ]);
    }
}
