# IOT-Modules

SETUP :

INSTALLER GIT / (php binaries : xampp) / composer / symfony (ajouter les éléments au PATH si ce n'est pas fait)

- (clone le projet) : ``` git clone https://github.com/gaetanse/IOT-Modules.git ```
- (aller dans le bon dossier) : ``` cd IOT-Modules ```
- (installer les dépendences) : ``` composer install ```
- (appliquer les migrations du back) : ``` symfony console doctrine:migrations:migrate ```
  
> [!WARNING]
> (si la migration ne fonctionne pas) :
> - ``` symfony console doctrine:database:drop --force ```
> - ```symfony console doctrine:database:create ```
> - ```symfony console doctrine:schema:update --force ```

- (Installer le certificat) : ``` symfony server:ca:install ```
- (lancer le projet) : ``` symfony server:start ```
- (mettre en place le scheduler sur un deuxieme terminal) : ``` symfony console messenger:consume scheduler_default ```

- [X]	Création d’une BDD répertoriant les modules, leurs détails et l’historique de fonctionnement.
- [X]	Création d’un formulaire, pour inscrire de nouveaux modules 
- [X]	Création d’une page de visualisation de l’état de fonctionnement des modules comme la valeur mesurée actuelle, durée de fonctionnement, nombre de données envoyées, état de marche ainsi qu’un graphique permettant de suivre l’évolution de la valeur mesurée.
- [X]	Sur l’interface, des notifications visuelles en cas de dysfonctionnement d’un module.
- [X]	Création d’un script de génération automatique d’état des modules.
- [X]	Les modules doivent générer des données numériques sur la mesure qu’ils effectuent (température, vitesse, etc.) et en stocker l’historique dans une base de données. Les modules peuvent tomber en panne puis refonctionner, tout cela de façon aléatoire. La génération de l’historique doit continuer lors de la navigation sur l’interface web de votre test.

Créer en 4 jours.
