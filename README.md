# Book & Go

Plateforme de réservation de prestations web réalisée dans le cadre du titre professionnel **Développeur Web et Web Mobile (DWWM)**.

## Démo en ligne

Application accessible ici :

https://bookandgo.infinityfreeapp.com

Compte test utilisateur :
email : sylvie@mail.fr
mot de passe : 12345678

Compte test administrateur :
email : nicolas@mail.fr
mot de passe : 12345678

## Présentation du projet

Book & Go est une application web permettant de réserver des prestations digitales comme :

- Audit de site web
- Accompagnement digital
- Atelier initiation web

La plateforme permet aux utilisateurs de :

- créer un compte
- se connecter
- réserver une prestation
- consulter leurs réservations via un tableau de bord.

Un espace administrateur permet de consulter et gérer les réservations.

## Fonctionnalités

### Utilisateur

- Inscription
- Connexion
- Réservation d'une prestation
- Tableau de bord utilisateur
- Historique des réservations

### Administrateur

- Tableau de bord administrateur
- Consultation des réservations
- Gestion du statut des réservations

## Technologies utilisées

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- Git / GitHub
- XAMPP

## Structure du projet

```
book-go-app/
│
├── api/
│   └── get-booked-slots.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── images/
│   └── js/
│       └── main.js
│
├── auth/
│   ├── login-process.php
│   ├── logout.php
│   └── register-process.php
│
├── config/
│   └── database.php
│
├── includes/
│   ├── flash.php
│   ├── footer.php
│   └── header.php
│
├── partials/
│   ├── booking-auth.php
│   ├── booking-guest.php
│   ├── dashboard-sidebar-admin.php
│   ├── dashboard-sidebar-user.php
│   ├── form-login.php
│   └── form-register.php
│
├── booking-process.php
├── confirmation.php
├── dashboard-admin.php
├── dashboard-user.php
├── index.php
├── login.php
├── README.md
├── register.php
├── service.php
└── update-reservation-status.php

## Installation en local

1. Cloner le projet :

git clone https://github.com/Nicolas88-dev/book-go-app.git

2. Placer le projet dans le dossier `htdocs` de XAMPP.

3. Créer une base de données MySQL :

book_go_db

4. Importer le fichier SQL du projet dans phpMyAdmin.

5. Configurer la connexion à la base de données dans :

config/database.php

6. Lancer Apache et MySQL depuis XAMPP.

7. Accéder au projet via :

http://localhost/book-go-app

## Base de données

La base de données utilisée par l'application se compose de trois tables principales :

- **users** : contient les informations des utilisateurs inscrits (nom, prénom, email, mot de passe, rôle).
- **services** : contient les prestations proposées (titre, description, durée).
- **reservations** : enregistre les réservations effectuées par les utilisateurs.

Les tables sont reliées entre elles par des clés étrangères :

- un utilisateur peut effectuer plusieurs réservations
- une prestation peut être réservée plusieurs fois

Un fichier SQL peut être importé dans **phpMyAdmin** afin de recréer automatiquement la structure de la base de données.

## Auteur

Projet réalisé par **Nicolas Lestrez** dans le cadre de la formation DWWM.
```
