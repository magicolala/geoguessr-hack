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

        $em->flush();

        return $this->render('geoBundle:Default:index.html.twig');
    }
}
