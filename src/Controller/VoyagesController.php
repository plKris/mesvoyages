<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of VoyagesController
 *
 * @author Lenovo
 */
class VoyagesController extends AbstractController {
    //put your code here
    #[Route('/voyages', name: 'voyages')]
    public function index(): Response{
        return $this->render ("pages/voyages.html.twig");
    }

}
