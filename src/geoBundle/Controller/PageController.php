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

        // Calculate points awarded via guess proximity
        function inRange($x, $min, $max) {
            return ($min <= $x && $x <= $max);
        };

        if(inRange($distance, 1, 2)) {
       $points = 10000;
     } else if(inRange($distance, 3, 10)) {
       $points = 7000;
     } else if(inRange($distance, 11, 50)) {
       $points = 4000;
     } else if(inRange($distance, 51, 200)) {
       $points = 3000;
     } else if(inRange($distance, 201, 500)) {
       $points = 2000;
     } else if(inRange($distance, 501, 800)) {
       $points = 1000;
     } else if(inRange($distance, 801, 1300)) {
       $points = 500;
     } else if(inRange($distance, 1301, 1600)) {
       $points = 400;
     } else if(inRange($distance, 1601, 2300)) {
       $points = 300;
     } else if(inRange($distance, 2301, 2800)) {
       $points = 200;
     } else if(inRange($distance, 2801, 3200)) {
       $points = 100;
     } else if(inRange($distance, 3200, 4500)) {
       $points = 50;
     } else if(inRange($distance, 4501, 6000)) {
       $points = 25;
     } else {
       $points = 0;
     };     

        return $this->render('geoBundle:Default:score.html.twig', array(
            'ville' => $ville,
            'distance' => $distance,
            'score' => $points
        ));
    }
}
