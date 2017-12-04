# Projet Web - ESIEA - 2016-2017

Création d'un blog (Panel administrateur, gestion d'article, date, commentaire) avec le framework LARAVEL.

# Membre du projet: 

Vinoth VENEDITTAN - Merwan BOUALI

# Fonctionnement du Blog: 

## Hiérarchie

| Administrateur suprême |
| ------------- |
| Administrateurs |
| Membres |

L'administrateur suprême ne peut être supprimé, c'est lui qui contrôle tous sur le Blog, il a accès à toutes les fonctionnalités.

| ID: admin | Mot de passe: admin |
| ------------- | ------------- |


## Système de Panel Administation 

#### Le panel administrateur est disponible seulement pour les utilisateurs avec un status d'administrateur.

Liste des posibilités d'un administrateur:  

- Créer un article (Nom, Contenu) 
- Modifier des postes (Editer, Supprimer)
- Supprimer des postes (Supprimer un post) 
- Supprimer des commentaires (Supprimer avec l'action X)
- Gérer les utilisateurs (Posibilité de rendre un membre inscrit administrateur ou non) /!\ Ceci n'est possible que par un utilisateur disposant les droits d'administrateur /!\


## Poster un article

- Titre, Contenu (avec la nom de l'utilisateur ainsi que la date du pote) 

## La liste des articles

La page d'accueil principale affiche toutes les articles postés sur le Blog, si le nombre d'article posté est supérieur une nouvelle page se créer avec une numérotation pour éviter de surcharger la page principale.

## Connexion/Déconnexion

Un système d'inscription et de déconnexion est créé avec possiblité de mémorisation (gestion de cockie).
Remarque: Un utilisateur s'inscrivant sur le Blog est automatique attribué comme titire de "Membre". C'est uniquement l'administrateur qui peut changer le status d'un utilisateur "membre".

## Gestion de commentaire

Il est possible de commenter un post, cette fonctionnalité est disponible pour tous les administrateurs ainsi que tous les utilisateurs inscrits ayant le status de membre.

- Le nom de l'utilisateur ayant posté le commentaire est affiché

## Système de bull de message

Afin d'informer les utilisateurs une bulle de message affiche et informe les activités des utilisateurs
- Bulle verte si l'action a fonctionné 
- Bulle rouge si l'action a échoué 
