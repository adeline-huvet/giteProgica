<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     *@Route("/", name="home")
     * @return void
     */
    public function index()
    {
        $gites = $this->repo->findLastGite();
      
        return $this->render('home/index.html.twig',[
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
}
