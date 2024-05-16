<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Favorite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FavoriteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Favorite::class);
    }

    /**
     * Trouve les voitures favorites associées à un utilisateur donné.
     *
     * @param User $user L'utilisateur pour lequel rechercher les voitures favorites
     * @return array Les voitures favorites de l'utilisateur
     */
    public function findFavoriteCarsByUser($user): array
    {
        return $this->createQueryBuilder('f')
            ->select('f.car') // Sélectionner l'entité voiture à partir de l'entité Favorite
            ->join('f.car', 'c') // Effectuer une jointure sur l'entité voiture à partir de l'entité Favorite
            ->andWhere('f.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }
}
