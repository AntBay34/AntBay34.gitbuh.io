<?php

namespace App\Controller;

use App\Entity\Bieres;
use App\Form\SearchBieresType;
use App\Repository\BieresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Request;

// #[Route('/bieres')]
class BieresController extends AbstractController
{
    #[Route('/bieres', name: 'bieres_index', methods: ['GET', 'POST'])]
    public function index(BieresRepository $bieresRepository, Request $request): Response
    {
        $bieres = $bieresRepository->findAll();
        $form = $this->createForm(SearchBieresType::class);
        $search = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $bieres = $bieresRepository->search($search->get('word')->getData());
        }
        if(empty($bieres)){
            $this->addFlash('message', 'Oops... il n\'y a pas de bières de ce type !');
            $bieres = $bieresRepository->findAll();
        }

        return $this->render('bieres/index.html.twig', [
            'bieres' => $bieres,
            'form' => $form->createView()
        ]);
    }


    #[Route('/bieres/{id}', name: 'bieres_show', methods: ['GET'])]
    public function show(Bieres $biere): Response
    {
        return $this->render('bieres/show.html.twig', [
            'biere' => $biere,
        ]);
    }

    #[Route('/bieres/add/favoris/{id}', name: 'bieres_add_favoris', methods: ['GET', 'POST'])]
    public function ajoutFavoris(Bieres $biere): Response
    {
        if(!$biere){
            throw new NotFoundHttpException('Cette bière n\'éxiste pas !');
        }
        $biere->addFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($biere);
        $em->flush();

        return $this->redirectToRoute('bieres_index');
    }

    #[Route('/bieres/supprimer/favoris/{id}', name: 'bieres_suppr_favoris', methods: ['GET', 'POST'])]
    public function supprFavoris(Bieres $biere): Response
    {
        if(!$biere){
            throw new NotFoundHttpException('Cette bière n\'éxiste pas !');
        }
        $biere->removeFavori($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($biere);
        $em->flush();

        return $this->redirectToRoute('bieres_index');
    }
}
