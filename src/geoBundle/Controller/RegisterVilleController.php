<?php

namespace geoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use geoBundle\Entity\Ville;

class RegisterVilleController extends Controller
{
    public function registerAction()
    {
        $ville = new Ville();

        $ville->setName('Cannes');
        $ville->setLat('43.54701719603172');
        $ville->setLon('7.031603886799303');

        $em = $this->getDoctrine()->getManager();
        $em->persist($ville);
        $em->flush();

        return $this->render('geoBundle:Default:index.html.twig');
    }
}
