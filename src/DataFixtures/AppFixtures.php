<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $luxuryCars = [
            ['model' => 'Audi RS3', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 60000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'BMW M5', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 8000, 'price' => 70000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Mercedes-Benz S-Class', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 7000, 'price' => 80000, 'category' => 'limousine', 'boite' => 'automatique'],
            ['model' => 'Porsche 911', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 90000, 'category' => 'sportive', 'boite' => 'manuelle'],
            ['model' => 'Lamborghini Aventador', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 300000, 'category' => 'sportive', 'boite' => 'automatique'],
            // Ajoutez d'autres modèles de voitures de luxe avec leurs caractéristiques et catégories
            ['model' => 'Ferrari 488 GTB', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 2000, 'price' => 250000, 'category' => 'sportive', 'boite' => 'manuelle'],
            ['model' => 'Rolls-Royce Phantom', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 6000, 'price' => 400000, 'category' => 'limousine', 'boite' => 'automatique'],
            ['model' => 'Bentley Continental GT', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 220000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Maserati GranTurismo', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 150000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Aston Martin DB11', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 180000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Bugatti Chiron', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 1000, 'price' => 3000000, 'category' => 'sportive', 'boite' => 'automatique'],
            ['model' => 'McLaren 720S', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 280000, 'category' => 'sportive', 'boite' => 'automatique'],
            ['model' => 'Lexus LC 500', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 100000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Jaguar F-Type', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 90000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Tesla Model S', 'doors' => 4, 'engineType' => 'Electrique', 'mileage' => 2000, 'price' => 100000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Acura NSX', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 200000, 'category' => 'sportive', 'boite' => 'automatique'],
            ['model' => 'Alfa Romeo Giulia', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 80000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Cadillac CTS-V', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 75000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Infiniti Q60', 'doors' => 2, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 70000, 'category' => 'coupe', 'boite' => 'automatique'],
            ['model' => 'Lincoln Continental', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 6000, 'price' => 85000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Genesis G70', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 4500, 'price' => 60000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Volvo S90', 'doors' => 4, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 65000, 'category' => 'berline', 'boite' => 'automatique'],
            // Ajoutez d'autres modèles de voitures de luxe avec leurs caractéristiques, catégories et boîte de vitesses
        ];

        $carImages = [
            'rs3_1.jpg',
            'm5_1.jpg',
            's_1.jpg',
            '911_1.jpg',
            'aventador_1.jpg',
            '488_1.jpg',
            'phantom_1.jpg',
            'continental_1.jpg',
            'granTurismo_1.jpg',
            'db11_1.jpg',
            'chiron_1.jpg',
            '720s_1.jpg',
            'lc_1.jpg',
            'fType_1.jpg',
            'teslaS_1.jpg',
            'nsx_1.jpg',
            'giulia_1.jpg',
            'ctsV_1.jpg',
            'q60_1.jpg',
            'lincolnContinental_1.jpg',
            'g70_1.jpg',
            's90_1.jpg',

            // Ajoutez d'autres noms d'images pour les autres voitures
        ];
    
        foreach ($luxuryCars as $index => $carData) {
            $car = new Car();
            $car->setTitle($carData['model']);
            $car->setDescription('Description de la voiture ' . $carData['model']);
            $car->setPrice($carData['price']);
            $car->setNote(rand(0, 10));
        
            $car->setCategory($carData['category']);
            $car->setBoite($carData['boite']);
        
            $car->setNumberOfDoors($carData['doors']);
            $car->setEngineType($carData['engineType']);
            $car->setMileage($carData['mileage']);
        
            // Créez une nouvelle image pour la voiture
            $image = new Image();
            $image->setImagePath('../../assets/images/cars/' . $carImages[$index]); // Remplacez 'path/to/images/' par le chemin réel de vos images
            $image->setImageTitle($carData['model'] . ' Image');
        
            // Associez l'image à la voiture
            $car->addImage($image);
        
            $manager->persist($car);
        }
        
        $manager->flush();
}
}