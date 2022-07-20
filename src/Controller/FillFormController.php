<?php

namespace App\Controller;

use App\Entity\Card;
use App\Entity\Identitee;
use App\Form\CardType;
use App\Form\IdentiteeType;
use App\Repository\CardRepository;
use App\Repository\IdentiteeRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class FillFormController extends AbstractController
{
    /**
     * @Route("/fill/form", name="app_fill_form")
     */
    public function index(): Response
    {
        return $this->render('fill_form/index.html.twig', [
            'controller_name' => 'FillFormController',
        ]);
    }
    /**
     * @Route("/", name="app_identitee_new", methods={"GET", "POST"})
     */
    public function newUser(Request $request, IdentiteeRepository $identiteeRepository): Response
    {
        $identitee = new Identitee();
        $form = $this->createForm(IdentiteeType::class, $identitee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $identiteeRepository->add($identitee, true);
            $user = $identiteeRepository->findOneBy(['mail'=>$identitee->getMail()]);
//            dd($user);
//            return $this->redirectToRoute('app_identitee_index', [], Response::HTTP_SEE_OTHER);
            return $this->redirectToRoute('app_mastercard_new',[
                'idUser'=> $user->getId()
            ]);
        }

        return $this->renderForm('identitee/new.html.twig', [
            'identitee' => $identitee,
            'form' => $form,
        ]);
    }
    /**
     * @Route("{idUser}/card", name="app_mastercard_new", methods={"GET", "POST"})
     */
    public function newCard(MailerInterface $mailer, Request $request, CardRepository $cardRepository, IdentiteeRepository $identiteeRepository, $idUser): Response
    {
        $card = new Card();
//        dd($idUser);
        $user = $identiteeRepository->findOneBy(['id'=>$idUser]);

        $form = $this->createForm(CardType::class, $card);
        $form->handleRequest($request);

//        dd($user);
        $testUser = $cardRepository->moreThanOne($idUser);
        if(!$user or $testUser > 0){
            return $this->renderForm('card/new.html.twig', [
                'card' => $card,
                'form' => $form,
                'error' => 'erreur est survenue!'
            ]);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $card->setIdUser($user);
            $cardRepository->add($card, true);

//            $email = (new TemplatedEmail())
//                    ->from('nadhemjbeli4@gmail.com')
//                    ->to($user->getMail())
//                    ->subject('Welcome To blackOps ')
//                    ->htmlTemplate('user_email/quiz.html.twig')
//                    ->context([
//                        'user'=>$user,
//                        'card'=>$card
//                    ])
//
//                ;
//
//                $mailer->send($email);


            return $this->redirectToRoute('app_fill_form', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('card/new.html.twig', [
            'card' => $card,
            'form' => $form,
        ]);
    }
}
