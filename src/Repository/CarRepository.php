<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findFavoriteCars(array $favoriteIds): array
    {
        // Recherchez les voitures correspondant aux identifiants favoris
        return $this->createQueryBuilder('c')
            ->andWhere('c.id IN (:favoriteIds)')
            ->setParameter('favoriteIds', $favoriteIds)
            ->getQuery()
            ->getResult();
    }

    public function findFavoriteCarsByUser(User $user): array
    {
        // Recherchez les voitures favorites de l'utilisateur
        return $this->createQueryBuilder('c')
            ->innerJoin('c.favorites', 'f') // Joignez l'entité Favorite avec alias 'f'
            ->andWhere('f.user = :user')    // Filtrez par utilisateur
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
    public function findByDoorsAndCategory($doors, $category)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.numberOfDoors = :doors')
            ->andWhere('c.category = :category')
            ->setParameter('doors', $doors)
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    public function findByEngineTypeAndCategory($engineType, $category)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.engineType = :engineType')
            ->andWhere('c.category = :category')
            ->setParameter('engineType', $engineType)
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    public function findByKilometerRangeAndCategory($minKilometer, $maxKilometer, $category)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.mileage BETWEEN :minKilometer AND :maxKilometer')
            ->andWhere('c.category = :category')
            ->setParameter('minKilometer', $minKilometer)
            ->setParameter('maxKilometer', $maxKilometer)
            ->setParameter('category', $category)
            ->getQuery()
            ->getResult();
    }

    public function findByEventType($event)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.event = :event')
            ->setParameter('event', $event)
            ->getQuery()
            ->getResult();
    }

    public function findByEventTypeAndCategory($event, $category)
{
    return $this->createQueryBuilder('c')
        ->andWhere('c.event = :event')
        ->andWhere('c.category = :category')
        ->setParameter('event', $event)
        ->setParameter('category', $category)
        ->getQuery()
        ->getResult();
}
}


    //    /**
    //     * @return Image[] Returns an array of Image objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('i.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Image
    //    {
    //        return $this->createQueryBuilder('i')
    //            ->andWhere('i.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
