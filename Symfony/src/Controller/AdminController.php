<?php

namespace App\Controller;

use App\Entity\Bieres;
use App\Entity\Images;
use App\Form\BieresType;
use App\Repository\BieresRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

// #[Route('/admin', name: 'admin_index')]
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_index')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('admin/allBeers', name: 'admin_allBeers', methods: ['GET'])]
    public function allBeers(BieresRepository $bieresRepository): Response
    {
        return $this->render('admin/allBeers.html.twig', [
            'bieres' => $bieresRepository->findAll(),
        ]);
    }

    #[Route('admin/allBeers/{id}', name: 'admin_show', methods: ['GET'])]
    public function adminShowBeer(Bieres $biere): Response
    {
        return $this->render('admin/show.html.twig', [
            'biere' => $biere,
        ]);
    }


    #[Route('admin/new', name: 'admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $biere = new Bieres();
        $form = $this->createForm(BieresType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère l'image :
            $images = $form->get('images')->getData();
            foreach($images as $image){
                $fichier = md5(uniqid()). '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                $img = new Images();
                $img->setName($fichier);
                $biere->addImage($img);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($biere);
            $entityManager->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bieres/new.html.twig', [
            'biere' => $biere,
            'form' => $form,
        ]);
    }

    
    
    #[Route('admin/{id}/edit', name: 'admin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bieres $biere): Response
    {
        $form = $this->createForm(BieresType::class, $biere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On récupère l'image :
            $images = $form->get('images')->getData();
            foreach($images as $image){
                $fichier = md5(uniqid()). '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );
                $img = new Images();
                $img->setName($fichier);
                $biere->addImage($img);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bieres/edit.html.twig', [
            'biere' => $biere,
            'form' => $form,
        ]);
    }

    #[Route('admin/{id}/delete', name: 'admin_delete', methods: ['POST'])]
    public function delete(Request $request, Bieres $biere): Response
    {
        if ($this->isCsrfTokenValid('delete'.$biere->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($biere);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('admin/delete/image/{id}', name: 'admin_delete_image', methods: ['DELETE'])]
    public function deleteImage(Images $image, Request $request){
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if($this->isCsrfTokenValid('delete'.$image->getId(), $data['_token'])){
            // On récupère le nom de l'image
            $nom = $image->getName();
            // On supprime le fichier
            unlink($this->getParameter('images_directory').'/'.$nom);

            // On supprime l'entrée de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }

    #[Route('admin/{id}/activerRef', name: 'admin_activate_ref', methods: ['POST', 'GET'])]
    public function activateRef(Bieres $biere): Response
    {
        $biere->setActif(($biere->getActif())? false : true);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($biere);
        $entityManager->flush();

        return new Response(true);
    }

    #[Route('admin/{id}/activerPromo', name: 'admin_activate_promo', methods: ['POST', 'GET'])]
    public function activatePromo(Bieres $biere): Response
    {
        $biere->setPromoBiere(($biere->getPromoBiere())? false : true);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($biere);
        $entityManager->flush();

        return new Response(true);
    }
}
