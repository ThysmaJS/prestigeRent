<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarsPageController extends AbstractController
{
    #[Route('/cars', name: 'carsPage')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cars = $entityManager->getRepository(Car::class)->findAll();

        return $this->render('carsPage.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('/car/details/{id}', name: 'carDetails')]
    public function details($id, EntityManagerInterface $entityManager): Response
    {
        $car = $entityManager->getRepository(Car::class)->find($id);

        if (!$car) {
            throw $this->createNotFoundException('L\'image n\'existe pas');
        }
        $images = $car->getImages();
        return $this->render('carDetails.html.twig', [
            'car' => $car,
            'images' => $images,
        ]);
    }
}
