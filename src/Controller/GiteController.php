<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\GiteSearch;
use App\Form\GiteSearchType;
use App\Repository\GiteRepository;
use App\Notification\ContactNotification;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GiteController extends AbstractController
{
    public function __construct(GiteRepository $giteRepository)
    {
        $this->giteRepository =$giteRepository;
    }

    /**
     * Undocumented function
     *@Route("/", name="gite.index")
     * @return void
     */
    public function index()
    {
        $gites = $this->giteRepository->findLastGite();
      
        return $this->render('gite/index.html.twig',[
            'gites' => $gites
        ]);
    }


    /**
     * @Route("/gite/{id}", name="gite.show")
     */
    public function show(int $id, Request $request, ContactNotification $notification): Response
    {
        $gite = $this->giteRepository->find($id);
        $contact = new Contact();
        $contact->setGite($gite);
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid())
        {   $notification->notify($contact);
            $this->addFlash('success', 'Votre email à bien été envoyé');
            return $this->redirectToRoute('gite.show', [
                'id' => $gite->getId(),
            ]);
        }
        return $this->render('gite/show.html.twig', [
            'gite' => $gite,
            'form' => $form ->createView()
        ]);   

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

        $gites = $this->giteRepository->findAllGiteSearch($search);

        return $this->render('gite/list.html.twig', [
            'gites' => $gites,
            'form' => $form->createView(),
        ]);
    }
}
