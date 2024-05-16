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
            ['model' => 'Audi RS3', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 60000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'BMW M5', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 8000, 'price' => 70000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Mercedes-Benz S-Class', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 7000, 'price' => 80000, 'category' => 'limousine', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Porsche 911', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 90000, 'category' => 'sportive', 'boite' => 'manuelle', 'event' => 'Buisness'],
            ['model' => 'Lamborghini Aventador', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 300000, 'category' => 'sportive', 'boite' => 'automatique', 'event' => 'Mariage'],
            ['model' => 'Ferrari 488 GTB', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 2000, 'price' => 250000, 'category' => 'sportive', 'boite' => 'manuelle', 'event' => 'Buisness'],
            ['model' => 'Rolls-Royce Phantom', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 6000, 'price' => 400000, 'category' => 'limousine', 'boite' => 'automatique', 'event' => 'EVG'],
            ['model' => 'Bentley Continental GT', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 220000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Maserati GranTurismo', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 150000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Aston Martin DB11', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 180000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Bugatti Chiron', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 1000, 'price' => 3000000, 'category' => 'sportive', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'McLaren 720S', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 280000, 'category' => 'sportive', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Lexus LC 500', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 100000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Anniversaire'],
            ['model' => 'Jaguar F-Type', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 90000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Mariage'],
            ['model' => 'Tesla Model S', 'doors' => 5, 'engineType' => 'Electrique', 'mileage' => 2000, 'price' => 100000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Acura NSX', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3000, 'price' => 200000, 'category' => 'sportive', 'boite' => 'automatique', 'event' => 'Mariage'],
            ['model' => 'Alfa Romeo Giulia', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 4000, 'price' => 80000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Cadillac CTS-V', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 75000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Infiniti Q60', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 3500, 'price' => 70000, 'category' => 'coupe', 'boite' => 'automatique', 'event' => 'Anniversaire'],
            ['model' => 'Lincoln Continental', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 6000, 'price' => 85000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Mariage'],
            ['model' => 'Genesis G70', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 4500, 'price' => 60000, 'category' => 'berline', 'boite' => 'automatique', 'event' => 'Buisness'],
            ['model' => 'Volvo S90', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 5000, 'price' => 65000, 'category' => 'berline', 'boite' => 'automatique'],
            ['model' => 'Ford Mustang GT500', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 2000, 'price' => 120000, 'category' => 'collection', 'boite' => 'Manuelle'],
            ['model' => 'Chevrolet Corvette Stingray', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 2500, 'price' => 110000, 'category' => 'collection', 'boite' => 'Automatique'],
            ['model' => 'Dodge Charger R/T', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 1800, 'price' => 90000, 'category' => 'collection', 'boite' => 'Automatique'],
            ['model' => 'Pontiac GTO', 'doors' => 3, 'engineType' => 'Essence', 'mileage' => 2200, 'price' => 95000, 'category' => 'collection', 'boite' => 'Manuelle'],
            ['model' => 'Range Rover Vogue', 'doors' => 5, 'engineType' => 'Diesel', 'mileage' => 3000, 'price' => 120000, 'category' => 'tout_terrain', 'boite' => 'automatique'],
            ['model' => 'Mercedes-Benz G-Class', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 2500, 'price' => 150000, 'category' => 'tout_terrain', 'boite' => 'automatique'],
            ['model' => 'Land Rover Defender 110', 'doors' => 5, 'engineType' => 'Diesel', 'mileage' => 2000, 'price' => 110000, 'category' => 'tout_terrain', 'boite' => 'automatique'],
            ['model' => 'Porsche Cayenne Turbo S', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 2200, 'price' => 180000, 'category' => 'tout_terrain', 'boite' => 'automatique'],
            ['model' => 'Audi Q8', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 2700, 'price' => 130000, 'category' => 'tout-terrain', 'boite' => 'automatique'],
            ['model' => 'Maybach S650 Pullman', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 2000, 'price' => 500000, 'category' => 'limousine', 'boite' => 'automatique',  'event' => 'EVG'],
            ['model' => 'Bentley Mulsanne', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 1800, 'price' => 550000, 'category' => 'limousine', 'boite' => 'automatique',  'event' => 'EVG'],
            ['model' => 'Cadillac Escalade ESV', 'doors' => 5, 'engineType' => 'Essence', 'mileage' => 2200, 'price' => 450000, 'category' => 'limousine', 'boite' => 'automatique',  'event' => 'EVG'], // Nouvelle limousine ajoutée        
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
            'gt500_1.jpg',
            'corvette_1.jpg',
            'charger_1.jpg',
            'pontiac_1.jpg',
            'vogue_1.jpg',
            'g_1.jpg',
            'defender_1.jpg',
            'cayenne_1.jpg',
            'q8_1.jpg',
            'mayback_1.jpg',
            'bentley_1.jpg',
            'cadillac_1.jpg',
            

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
            if (isset($carData['event'])) {
                $car->setEvent($carData['event']);
            }
        
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