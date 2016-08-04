<?php

namespace geoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use geoBundle\Entity\Ville;

class PageController extends Controller
{
    public function settrAction()
    {
        return $this->render('geoBundle:Default:settr.html.twig');
    }
    public function gameAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('geoBundle:Ville')->findOneRandom();
        
        return $this->render('geoBundle:Default:game.html.twig', array(
            'ville' => $ville
        ));
    }
}
