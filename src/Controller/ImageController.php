<?php
namespace App\Controller;

use App\Entity\Car;
use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{
    #[Route('/saveImages', name: 'app_save_images')]
    public function saveImages(EntityManagerInterface $entityManager): Response
    {
        // Création d'une voiture
        $car = new Car();
        $car->setTitle("Ma voiture");
        $car->setDescription("Description de ma voiture");
        $car->setCategory("Catégorie de ma voiture");
        $car->setPrice(10000);
        $car->setNote(4);
        
        // Création des images
        $image1 = new Image();
        $image1->setImagePath("../../assets/images/cars/image1.jpg");
        $image1->setImageTitle("Titre de l'image 1");
        
        // $image2 = new Image();
        // $image2->setImagePath("../../assets/images/cars/image2.jpg");
        // $image2->setImageTitle("Titre de l'image 2");

        // $image3 = new Image();
        // $image3->setImagePath("../../assets/images/cars/image3.jpg");
        // $image3->setImageTitle("Titre de l'image 3");

        // Ajout des images à la voiture
        $car->addImage($image1);
        // $car->addImage($image2);
        // $car->addImage($image3);
        
        
        // Enregistrement en base de données
        $entityManager->persist($car);
        $entityManager->flush();
        
        return new Response('Images enregistrées avec succès.');
    }
}

