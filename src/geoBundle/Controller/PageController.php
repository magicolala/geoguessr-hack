<?php

namespace geoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function settrAction()
    {
        return $this->render('geoBundle:Default:settr.html.twig');
    }
}
