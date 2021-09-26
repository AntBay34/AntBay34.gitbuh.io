<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProfilType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index(): Response
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }

    #[Route('/users/edit', name: 'users_edit', methods: ['GET', 'POST'])]
    public function editProfile(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ProfilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('message', 'Profil mis à jour');
            return $this->redirectToRoute('users');
            
        }

        return $this->renderForm('users/editProfil.html.twig', [
        'form' => $form]);
    }


    #[Route('/users/edit/pass', name: 'users_edit_pass', methods: ['GET', 'POST'])]
    public function editPass(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        if($request->isMethod('POST')){
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            if($request->request->get('pass') == $request->request->get('pass2'))
            {
                $user->setPassword($passwordEncoder->encodePassword($user, $request->request->get('pass')));
                $em->flush();
                $this->addFlash('message', 'Mot de passe mis à jour');
                
                return $this->redirectToRoute('users');
            }else{
                $this->addFlash('error', 'Les deux mots de passe ne sont pas identiques !');
            }
        }
        return $this->renderForm('users/editPass.html.twig');
    }

    #[Route('/users/contact', name: 'users_contact', methods: ['GET', 'POST'])]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('contact@MesBieres.fr')
                ->subject($contact->get('object')->getData())
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'mail' => $contact->get('email')->getData(),
                    'objet' => $contact->get('object')->getData(),
                    'message' => $contact->get('message')->getData()
                ]);
            $mailer->send($email);
            $this->addFlash('message', 'Votre e-mail a bien été envoyé !');
            return $this->redirectToRoute('users_contact');
        }
        return $this->render('users/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    // #[Route('/users/test', name: 'users_edit_test', methods: ['GET', 'POST'])]
    // public function editProfil(Request $request): Response
    // {
    //     $user = $this->getUser();
    //     $form = $this->createForm(ProfilType::class, $user);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {


    //         $em = $this->getDoctrine()->getManager();
    //         $em->persist($user);
    //         $em->flush();

    //         $this->addFlash('message', 'Profil mis à jour');
    //         return $this->redirectToRoute('users');
            
    //     }

    //     return $this->renderForm('users/test.html.twig', [
    //     'form' => $form]);
    // }
}
