<?php

namespace App\Controller;

use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GiteController extends AbstractController
{
    public function __construct(GiteRepository $giteRepository)
    {
        $this->repo =$giteRepository;
    }

    /**
     * Undocumented function
     *@Route("/", name="gite.index")
     * @return void
     */
    public function index()
    {
        $gites = $this->repo->findLastGite();
      
        return $this->render('gite/index.html.twig',[
            'gites' => $gites
        ]);
    }


    /**
     * @Route("/gite/{id}", name="gite.show")
     */
    public function show(int $id): Response
    {
        $gite = $this->repo->find($id);
        return $this->render('gite/show.html.twig', ['gite' => $gite,]);   

    }


    /**
     * @Route("/gites", name="gite.list")
     */
    public function list(Request $request): Response
    {   //Créer une entité Recherche
        //Créer le formulaire associés
        //Gérer le traitement des données via SQL
        $search = new GiteSearch();
        $form = $this->createForm(GiteSearchType::class, $search );
        $form->handleRequest($request);

        $gites = $this->repo->findAllGiteSearch($search);

        return $this->render('gite/list.html.twig', [
            'gites' => $gites,
            'form' => $form->createView(),
        ]);
    }
}
