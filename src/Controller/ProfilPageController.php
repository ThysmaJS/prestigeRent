<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface; // Importer TokenStorageInterface
use Symfony\Component\Security\Core\User\UserInterface; // Importer UserInterface
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted; // Importer IsGranted

class ProfilPageController extends AbstractController
{
    #[Route('/profil', name: 'profil_page')]
    public function index(TokenStorageInterface $tokenStorage): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        // Récupérer le token
        $token = $tokenStorage->getToken();

        // Vérifier si un token existe
        if (!$token) {
            throw $this->createNotFoundException('Aucun utilisateur connecté');
        }

        // Récupérer l'utilisateur à partir du token
        $user = $token->getUser();

        // Vérifier si l'utilisateur est un objet de type UserInterface
        if (!$user instanceof UserInterface) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Passer les informations de l'utilisateur à Twig
        return $this->render('profilPage.html.twig', [
            'user' => $user,
        ]);
    }
}
