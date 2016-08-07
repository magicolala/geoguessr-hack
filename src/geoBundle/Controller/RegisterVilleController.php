<?php

namespace geoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use geoBundle\Entity\Ville;

class RegisterVilleController extends Controller
{
    public function registerAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cannes = new Ville();
        $cannes->setName('Cannes');
        $cannes->setLat('43.54701719603172');
        $cannes->setLon('7.031603886799303');
        $em->persist($cannes);

        $versailles = new Ville();
        $versailles->setName('Versailles');
        $versailles->setLat('48.80262840351376');
        $versailles->setLon('2.1287524621873217');
        $em->persist($versailles);

        $laroche = new Ville();
        $laroche->setName('La-Roche-Sur-Yon');
        $laroche->setLat('46.67048263549805');
        $laroche->setLon('-1.4269371032714844');
        $em->persist($laroche);

        $paris = new Ville();
        $paris->setName('Paris');
        $paris->setLat('48.723902');
        $paris->setLon('2.829666');
        $em->persist($paris);

        $rouen = new Ville();
        $rouen->setName('Rouen');
        $rouen->setLat('49.442956');
        $rouen->setLon('1.094962');
        $em->persist($rouen);



        $lyon = new Ville();
        $lyon->setName('Lyon');
        $lyon->setLat('45.761516');
        $lyon->setLon('4.835953');
        $em->persist($lyon);

        $em->flush();

        return $this->render('geoBundle:Default:index.html.twig');
    }
}
