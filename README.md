# Campus Manager

Un projet CRUD en PHP pur modernisé avec Tailwind CSS, DaisyUI et FontAwesome. L'application permet de gérer des étudiants, leurs promotions et les comptes utilisateurs dans un environnement élégant et sécurisé.

## 🚀 Fonctionnalités clés
- Gestion complète des étudiants (création, lecture, mise à jour, suppression)
- Tableaux et fiches détaillées avec interface responsive Tailwind + DaisyUI
- Authentification utilisateur avec `password_hash` / `password_verify`
- Messages flash et navigation dynamique selon le rôle
- Schéma MySQL prêt à l'emploi pour étendre facilement le projet (cours, promotions, rôles)

## 🛠️ Stack & outils
- **Langage** : PHP 8+
- **Base de données** : MySQL 8
- **UI** : Tailwind CSS (CDN), DaisyUI, FontAwesome 6, Google Fonts (Poppins)
- **Gestion de sessions** : PHP native

## 📦 Installation locale
1. Cloner ou copier le projet dans votre dossier web (`C:\laragon\www` par exemple).
2. Importer la base de données :
   - Ouvrir `functions/db.sql`
   - Exécuter le script dans votre serveur MySQL (`phpMyAdmin`, `MySQL Workbench`, etc.)
3. Vérifier la configuration de connexion dans `functions/db.php` :
   ```php
   $dbhost = 'localhost';
   $dbname = 'campus_manager';
   $dbuser = 'root';
   $dbpassword = '';
   ```
4. Démarrer votre serveur web (Laragon, XAMPP, WAMP...).
5. Accéder au projet via `http://localhost/Application_crud`.

### Comptes de démonstration
| Rôle   | Email                         | Mot de passe |
|--------|-------------------------------|--------------|
| Admin  | `admin@campusmanager.test`    | `Admin123!`  |
| Manager| `manager@campusmanager.test`  | `User123!`   |

## 📁 Structure simplifiée
- `index.php` : page d'accueil et présentation
- `create.php`, `read.php`, `update.php`, `readSingle.php`, `delete.php` : écrans CRUD étudiants
- `login.php`, `register.php`, `disconect.php` : cycle d'authentification
- `functions/` : connexion BDD, accès aux données, logique métiers
- `layouts/` : gabarits communs (header, footer)
- `assets/` : médias (images, logos)

## 🔧 Personnalisation
- Les couleurs et polices sont configurées dans `layouts/header.php` via Tailwind CDN.
- Les composants DaisyUI peuvent être changés (boutons, badges, alertes) sans build supplémentaire.
- Le schéma `db.sql` inclut des tables supplémentaires (`cours`, `etudiant_cours`) pour future extension.

## ✅ Bonnes pratiques intégrées
- Requêtes préparées systématiques
- Validations serveur avant chaque opération critique
- Messages flash persistants stockés en session
- Séparation logique (fonctions dédiées pour l'accès aux étudiants et promotions)

## 📬 Contact
Pour toute question, collaboration ou devis :

- **Email** : makadenis370@gmail.com
- **Téléphone** : +243 818 252 385 / +243 997 435 030
- **Réseaux sociaux** :
  - [Twitter](https://twitter.com/MakaDenis3)
  - [LinkedIn](https://www.linkedin.com/in/Denismaka)
  - [GitHub](https://github.com/Denismaka)
  - [Facebook](https://www.facebook.com/Denismaka)

---
© 2025 Campus Manager · Projet pédagogique par Denis Maka.
