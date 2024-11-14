<?php

namespace App\Controller\admin;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of AdminVoyagesController
 *
 * @author Lenovo
 */
class AdminVoyagesController extends AbstractController {
    //put your code here
    /**
 * 
 * @var VisiteRepository
 */
private $repository;
/**
 * 
 * @param VisiteRepository $repository
 */
public function __construct(VisiteRepository $repository) {
    $this->repository = $repository;
}

    #[Route('/admin', name: 'admin.voyages')]
    public function index(): Response{
        $visites = $this->repository->findAllOrderBy('datecreation','DESC');
        return $this->render ("admin/admin.voyages.html.twig",[
            'visites' => $visites
        ]);
    }
    
    #[Route('/voyages/tri/{champ}/{ordre}', name: 'voyages.sort')]
    public function sort($champ,$ordre): Response{
        $visites = $this->repository->findAllOrderBy($champ,$ordre);
        return $this->render ("pages/voyages.html.twig",[
            'visites' => $visites
        ]);
    }
     #[Route('/voyages/recherche/{champ}', name: 'voyages.findallequal')]
    public function findAllEqual($champ, Request $request): Response{
         $valeur = $request->get("recherche");
        $visites = $this->repository->findByEqualValue($champ,$valeur);
        return $this->render ("pages/voyages.html.twig",[
            'visites' => $visites
        ]);
    }
    
    #[Route('/voyages/voyage/{id}', name: 'voyages.showone')]
    public function showOne($id): Response{
        $visite = $this->repository->find($id);
        return $this->render ("pages/voyage.html.twig",[
            'visite' => $visite
        ]);
    }
    
    #[Route('/admin/suppr/{id}', name: 'admin.voyage.suppr')]
    public function suppr(int $id): Response{
        $visite = $this->repository->find($id);
        $this->repository->remove($visite);
        return $this->redirectToRoute("admin.voyages");
    }
}
