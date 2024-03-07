<?php

namespace App\Controller;

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
        // Liste des chemins d'images
        $imagePaths = [
            '../../assets/images/cars/image1.jpg',
            '../../assets/images/cars/image2.jpg',
            '../../assets/images/cars/image3.jpg',
            '../../assets/images/cars/image4.jpg',
            '../../assets/images/cars/image5.jpg',
            '../../assets/images/cars/image6.jpg',
            '../../assets/images/cars/image7.jpg',
            '../../assets/images/cars/image8.jpg',
            '../../assets/images/cars/image9.jpg',
            '../../assets/images/cars/image10.jpg'
            // Ajoutez d'autres chemins d'images au besoin
        ];

        foreach ($imagePaths as $key => $imagePath) {
            // Création d'un objet Image
            $image = new Image();

            // Génération du prix aléatoire entre 10 000 et 100 000 euros
            $price = rand(10000, 100000);

            // Titre de l'image
            $title = 'Voiture ' . ($key + 1); // Le numéro de l'image commence à 1

            // Description Lorem Ipsum

            // Catégorie de l'image (peut-être générée aléatoirement si nécessaire)
            $category = 'Catégorie de l\'image';

            // Note aléatoire entre 0 et 5 avec un pas de 0.1
            $note = round(rand(0, 50) / 10, 1);

            // Attribution des valeurs à l'objet Image
            $image->setImagePath($imagePath);
            $image->setTitle($title);
            $image->setDescription("Voici la meilleure des voitures");
            $image->setCategory($category);
            $image->setPrice($price);
            $image->setNote($note);

            // Enregistrement de l'objet dans la base de données
            $entityManager->persist($image);
        }

        // Exécution des requêtes d'insertion en base de données
        $entityManager->flush();

        return new Response('Images enregistrées avec succès.');
    }
}

