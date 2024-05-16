## I. Instructions pour démarrer le projet

1. **Installer Docker Desktop**
   - Assurez-vous que Docker Desktop est installé sur votre machine. [Télécharger Docker Desktop](https://www.docker.com/products/docker-desktop).

2. **Puller le projet**
   - Clonez le dépôt du projet en utilisant la commande suivante :
     ```bash
     git clone https://github.com/ThysmaJS/prestigeRent.git
     ```
   - Accédez au répertoire du projet :
     ```bash
     cd chemin/jusquau/projet
     ```

3. **Installer les conteneurs Docker**
   - Dans le terminal du projet, tapez la commande suivante pour installer les conteneurs Docker :
     ```bash
     docker-compose up -d
     ```

4. **Charger les données du site**
   - Utilisez la commande Symfony pour charger les données :
     ```bash
     symfony console d:f:l
     ```

5. **Lancer le serveur en local**
   - Pour démarrer le serveur Symfony en arrière-plan :
     ```bash
     symfony serve -d
     ```

6. **Lancer les fonctionnalités du site**
   - Enfin, utilisez Yarn pour activer toutes les fonctionnalités du site :
     ```bash
     yarn watch
     ```

---


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

Bonne visite ! 🎉
