# Projet Prestige Rent

## I. Lancement du Projet

1. Assurez-vous d'avoir DockerDesktop installé sur votre machine.
2. Clonez le projet et naviguez jusqu'à la racine.
3. Utilisez la commande suivante pour démarrer les services en arrière-plan :
    ```bash
    docker-compose up -d
    ```

## II. Accès à la Base de Données (BDD)

1. Ouvrez DockerDesktop et cliquez sur le port correspondant à "pgadmin-1".
2. Utilisez les identifiants suivants pour vous connecter :
   - Email: prestige@rent.com
   - Mot de passe: admin
3. Faites un clic droit sur "Server" dans le panneau de gauche, puis sélectionnez "Register" -> "Server".
4. Entrez les informations suivantes :
   - **Name** : Database
   - **Hostname/Address** : database
   - **Login** : PrestigeRent
   - **Mot de passe** : admin

---

**Note :** Assurez-vous que DockerDesktop est en cours d'exécution avant de lancer le projet.

N'hésitez pas à contribuer, signaler des problèmes ou demander de l'aide si nécessaire. Bon codage !
