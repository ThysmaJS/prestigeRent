<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/homePage', name: 'app_home_page')]
    public function index(): Response
    {
        return $this->render('homePage.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
