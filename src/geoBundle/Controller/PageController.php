<?php

namespace geoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use geoBundle\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;

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

    public function gameReponseAction(Request $request)
    {
        function get_distance_m($lat1, $lng1, $lat2, $lng2) {
          $earth_radius = 6378137;   // Terre = sphère de 6378km de rayon
          $rlo1 = deg2rad($lng1);
          $rla1 = deg2rad($lat1);
          $rlo2 = deg2rad($lng2);
          $rla2 = deg2rad($lat2);
          $dlo = ($rlo2 - $rlo1) / 2;
          $dla = ($rla2 - $rla1) / 2;
          $a = (sin($dla) * sin($dla)) + cos($rla1) * cos($rla2) * (sin($dlo) * sin($dlo
        ));
          $d = 2 * atan2(sqrt($a), sqrt(1 - $a));
          return ($earth_radius * $d);
        }
        $reponse = $request->request->get('position');
        $villeLatStr = $request->request->get('ville_lat');
        $villeLonStr = $request->request->get('ville_lng');

        $pattern = '/(\d+\.\d+)/';
        $test = preg_match_all($pattern, $reponse, $matches);

        $positionLatStr = $matches[0][0];
        $positionLonStr = $matches[0][1];

        $positionLat = floatval($matches[0][0]);
        $positionLon = floatval($matches[0][1]);


        $villeLat = floatval($villeLatStr);
        $villeLon = floatval($villeLonStr);
        $em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('geoBundle:Ville')->findOneRandom();

        $distance = round(get_distance_m($positionLat, $positionLon, $villeLat, $villeLon) / 1000, 3);
        var_dump($distance); die;
        return $this->render('geoBundle:Default:game.html.twig', array(
            'ville' => $ville,
            'distance' => $distance
        ));
    }
}
