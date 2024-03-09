<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class CreateUserController extends AbstractController
{
    #[Route('/createUser', name: 'app_createUser_page')]
    public function index(EntityManagerInterface $entityManager, UserPasswordHasherInterface $hasher): Response
    {
        $user = new User();
        $user->setEmail('mathys@dev.com')
        ->setUsername('Thysma')
        ->setPassword($hasher->hashPassword($user, 'admin'))
        ->setRoles([]);

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->render('security/login.html.twig', [
        ]);
    }
}
