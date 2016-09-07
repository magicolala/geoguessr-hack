geoGuessr-hack
==============

A Symfony project created on August 4, 2016, 11:19 am.
## Description
geoGuessr-hack fut réalisé en binôme durant un hackathon de 30h de la Wild Code School. L'objectif était de réaliser appli et le thème était le site [](https://geoguessr.com/).
Nous avions choisi de refaire l'équivalent en mode un joueur.
Technologies utilisées: 
- [Symfony](https://symfony.com/)
- [jQuery](https://jquery.com/)
- [Google Maps JavaScript API](https://developers.google.com/maps/?hl=fr)
- [Bootstrap](http://getbootstrap.com/)
- CSS
- HTML 5

## Captures d'écrans
*Écran de jeu*

![Écran de jeu](https://raw.githubusercontent.com/PTony/geoguessr-hack/master/Ressources/screenshots/geoguessr-hack_-_game_-_20160907142100.png)

*Résultat après soumission réponse*

![Résultat après soumission réponse](https://raw.githubusercontent.com/PTony/geoguessr-hack/master/Ressources/screenshots/geoguessr-hack_-_result_-_20160907142201.png)

*Résultat final*

![Résultat final](https://raw.githubusercontent.com/PTony/geoguessr-hack/master/Ressources/screenshots/geoguessr-hack_-_final_result_-_20160907142713.png)

## Installation:

`composer install`

`php app/console doctrine:database:create`

`php app/console doctrine:schema:update --force`

`sudo chmod.sh`

ensuite avec le navigateur, se rendre sur [http://localhost/<dossier_d_installation>/web/app.php/ville](http://localhost/<dossier_d_installation>/web/app.php/ville)
pour peupler la base avec des exemples

puis sur [http://localhost/<dossier_d_installation>/web/app_dev.php/game](http://localhost/<dossier_d_installation>/web/app_dev.php/game) pour commencer à jouer

