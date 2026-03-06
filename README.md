# Projet site web Marché de Rungis
## Contexte
Projet réalisé en L2 informatique (2024-2025). 
Réalisation d'un site web avec une application mobile sur le modèle du site web du marché de Rungis.
- en collaboration avec OYANI Muzhgan, KINA Maria, et TURQUIN Roméo
- université : URCA - UFR Sciences Exactes et Naturelles
- professeur référent : RABAT Cyril
- identifiant de la matière : info0406
Seule l'application web est présente dans le dépôt car je n'ai travaillé que sur cette partie. Pour une description complète du projet, un compte-rendu est présent dans le dossier 'doc' avec MDL, MCD, et digrammes de navigation et de cas d'utilisations.
## Installation
__Prérequis__
- Serveur web avec SGBD (MySQL)
- PHP
- Composer
- Node.js et NPM
__Cloner le projet__
```
git clone https://github.com/LindenTreesLeaf/Rungis_Market/
cd Rungis_Market
```
__Installation des éléments manquants__
```
composer install
npm install
copy .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
```
__Utilisation__
Différents utilisateurs de tests ont été ajouté grâce aux seeders, avec comme mot de passe 'password' :
- admin : nom='Doja Cat', email='doja@cat.us'
- supervisor : nom='Ariana Grande', email='ariana@grande.us'
- seller : nom='Carbi B', email='carbi@b.us'
- client : nom='Flo Milli', email='flo@milli.us'
- tous les rôles : nom='test', email='t@t.t'
