<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Car;
use App\Entity\Favorite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\CarRepository;
use App\Repository\CategoryRepository; // Assurez-vous d'importer la classe CategoryRepository
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\FavoriteRepository;
use App\Repository\UserRepository;







class CarsPageController extends AbstractController



{

    #[Route('/cars/add-to-favorites/{id}', name: 'add_to_favorites')]
    public function addToFavorites($id, EntityManagerInterface $entityManager, SessionInterface $session): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Vous devez être connecté pour ajouter une voiture en favoris']);
        }
    
        $car = $entityManager->getRepository(Car::class)->find($id);
        if (!$car) {
            return new JsonResponse(['success' => false, 'message' => 'La voiture sélectionnée n\'existe pas']);
        }
    
        // Vérifiez si la voiture est déjà en favoris de l'utilisateur
        $favorite = $entityManager->getRepository(Favorite::class)->findOneBy(['user' => $user, 'car' => $car]);
        if ($favorite) {
            return new JsonResponse(['success' => false, 'message' => 'La voiture est déjà en favoris']);
        }
    
        // Créez une nouvelle entrée dans la table des favoris
        $favorite = new Favorite();
        $favorite->setUser($user);
        $favorite->setCar($car);
        $entityManager->persist($favorite);
        $entityManager->flush();
    
        // Mettez à jour les favoris dans la session
        $favoriteCarIds = $session->get('favoriteCarIds', []);
        $favoriteCarIds[] = $car->getId();
        $session->set('favoriteCarIds', $favoriteCarIds);
    
        return new JsonResponse(['success' => true, 'message' => 'La voiture a été ajoutée en favoris avec succès']);
    }
    
    #[Route('/cars/remove-from-favorites/{id}', name: 'remove_from_favorites')]
    public function removeFromFavorites($id, EntityManagerInterface $entityManager, SessionInterface $session): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['success' => false, 'message' => 'Vous devez être connecté pour supprimer une voiture des favoris']);
        }
    
        $car = $entityManager->getRepository(Car::class)->find($id);
        if (!$car) {
            return new JsonResponse(['success' => false, 'message' => 'La voiture sélectionnée n\'existe pas']);
        }
    
        // Trouver l'entrée de favoris correspondante
        $favorite = $entityManager->getRepository(Favorite::class)->findOneBy(['user' => $user, 'car' => $car]);
        if (!$favorite) {
            return new JsonResponse(['success' => false, 'message' => 'La voiture n\'est pas dans les favoris']);
        }
    
        // Supprimer l'entrée de favoris de la base de données
        $entityManager->remove($favorite);
        $entityManager->flush();
    
        // Mettez à jour les favoris dans la session
        $favoriteCarIds = $session->get('favoriteCarIds', []);
        $index = array_search($car->getId(), $favoriteCarIds);
        if ($index !== false) {
            unset($favoriteCarIds[$index]);
            $session->set('favoriteCarIds', array_values($favoriteCarIds));
        }
    
        return new JsonResponse(['success' => true, 'message' => 'La voiture a été retirée des favoris avec succès']);
    }

    #[Route('/favorites', name: 'favorite_cars')]
    public function favoriteCars(Request $request, CarRepository $carRepository, SessionInterface $session, UserRepository $userRepository)
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = $this->getUser();
    
        if (!$user) {
            // Gérer le cas où aucun utilisateur n'est authentifié
            // Redirection vers la page de connexion ou affichage d'un message d'erreur
            // ...
        }
    
        // Récupérer les identifiants des voitures favorites de l'utilisateur depuis la session
        $favoriteIds = $session->get('favorites', []);
    
        // Utiliser le CarRepository pour trouver les voitures favorites de l'utilisateur actuel
        $favoriteCars = $carRepository->findFavoriteCarsByUser($user);
    
        // Charger la vue carsPage.html.twig avec uniquement les voitures favorites
        return $this->render('carsPage.html.twig', [
            'cars' => $favoriteCars,
        ]);
    }
    

    #[Route('/filter', name: 'filterCars')]
    public function filter(Request $request, CarRepository $carRepository): Response
    {
        $doors = $request->query->get('doors');
        $engineTypes = $request->query->get('engineTypes');
        $minKilometer = $request->query->get('minKilometer');
        $maxKilometer = $request->query->get('maxKilometer');
        $type = $request->query->get('type');
        $event = $request->query->get('event'); // Nouveau paramètre pour le type d'événement
        
        // Assurez-vous que les champs min et max ont des valeurs par défaut si elles sont vides
        if (empty($minKilometer)) {
            $minKilometer = 0;
        }
        
        if (empty($maxKilometer)) {
            $maxKilometer = 100000000; // Mettez la valeur maximale selon vos besoins
        }
        
        // Requête pour récupérer les voitures filtrées en fonction du nombre de portes, du type de moteur et du kilométrage
        $filteredCarsQuery = $carRepository->createQueryBuilder('c');
        
        if (!empty($doors)) {
            $filteredCarsQuery->andWhere('c.numberOfDoors IN (:doors)')
                ->setParameter('doors', $doors);
        }
        
        if (!empty($engineTypes)) {
            $filteredCarsQuery->andWhere('c.engineType IN (:engineTypes)')
                ->setParameter('engineTypes', $engineTypes);
        }
        
        $filteredCarsQuery->andWhere('c.mileage BETWEEN :minKilometer AND :maxKilometer')
            ->setParameter('minKilometer', $minKilometer)
            ->setParameter('maxKilometer', $maxKilometer);
        
        if (!empty($type)) {
            $filteredCarsQuery->andWhere('c.category = :category')
                ->setParameter('category', $type);
        }
        
        // Si le type d'événement est spécifié, filtrez les voitures en fonction de cet événement
        if (!empty($event)) {
            $filteredCarsQuery->andWhere('c.event = :event')
                ->setParameter('event', $event);
        }
        
        
        $filteredCars = $filteredCarsQuery->getQuery()->getResult();
        
        return $this->render('carsPage.html.twig', [
            'cars' => $filteredCars,
        ]);
    }
    
    

    
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
            throw $this->createNotFoundException('La voiture n\'existe pas');
        }
        
        // Récupérer les images associées à cette voiture
        $images = $entityManager->getRepository(Image::class)->findBy(['car' => $car]);
    
        return $this->render('carDetails.html.twig', [
            'car' => $car,
            'images' => $images,
        ]);
    }
    
    }
