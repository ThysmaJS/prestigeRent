<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/homePage', name: 'app_home_page')]
    public function index(): Response
    {
        $imageDirectory = $this->getParameter('kernel.project_dir') . '/assets/images/cars/';
        $images = scandir($imageDirectory);
        $images = array_diff($images, ['.', '..']); // Supprimer les entrées '.' et '..'

        return $this->render('homePage.html.twig', [
            'images' => $images,
        ]);
    }
}
