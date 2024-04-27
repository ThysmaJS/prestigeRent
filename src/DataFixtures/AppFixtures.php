<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categories = ['berline', 'citadine', 'collection', 'coupé', 'limousine', 'sportive', 'tout terrain'];
        $boites = ['automatique', 'manuel'];
        $events = ['Mariage', 'Anniversaire', 'EVG', 'Buisness'];

        for ($i = 1; $i <= 10; $i++) {
            $car = new Car();
            $car->setTitle('Voiture ' . $i);
            $car->setDescription('Description de la voiture ' . $i);
            $car->setPrice(rand(1000, 50000));
            $car->setNote(rand(0, 10));

            $category = $categories[array_rand($categories)];
            $car->setCategory($category);

            $boite = $boites[array_rand($boites)];
            $car->setBoite($boite);

            $event = $events[array_rand($events)];
            $car->setEvent($event);

            // Définir des valeurs spécifiques pour le kilométrage, le type de moteur et le nombre de portes
            $car->setMileage(rand(10000, 200000));
            $car->setEngineType('Essence'); // Vous pouvez modifier cela selon vos besoins
            $car->setNumberOfDoors(rand(2, 5)); // Vous pouvez modifier cela selon vos besoins

            // Ajout de l'image spécifique
            // $image = $this->createImage($i);
            // $image->setImagePath('image' . $i . '.jpg');
            // $car->addImage($image);

            $manager->persist($car);
        }

        $manager->flush();
    }

    // Méthode pour créer et renvoyer une image spécifique
    private function createImage($index)
    {
        // $image = new Image();

        // Utilisation d'une autre méthode pour définir les propriétés de l'image
        $imagePath = "../../assets/images/cars/image" . $index . ".jpg";
        $imageTitle = "Titre de l'image " . $index;

    //     $image->setImagePath($imagePath);
    //     $image->setImageTitle($imageTitle);

    //     return $image;
    }
}
