<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of AccueilController
 *
 * @author Lenovo
 */
class AccueilController extends AbstractController {
    //put your code here
    #[Route('/', name: 'accueil')]
    public function index(): Response{
        return $this->render ("pages/accueil.html.twig");
    }
}
