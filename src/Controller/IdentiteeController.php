<?php

namespace App\Controller;

use App\Entity\Identitee;
use App\Form\IdentiteeType;
use App\Repository\CardRepository;
use App\Repository\IdentiteeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/identitee")
 */
class IdentiteeController extends AbstractController
{
    /**
     * @Route("/", name="app_identitee_index", methods={"GET"})
     */
    public function index(IdentiteeRepository $identiteeRepository): Response
    {
        return $this->render('identitee/index.html.twig', [
            'identitees' => $identiteeRepository->findAll(),
        ]);
    }



    /**
     * @Route("/{id}", name="app_identitee_show", methods={"GET"})
     */
    public function show(Identitee $identitee): Response
    {
        return $this->render('identitee/show.html.twig', [
            'identitee' => $identitee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_identitee_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Identitee $identitee, IdentiteeRepository $identiteeRepository): Response
    {
        $form = $this->createForm(IdentiteeType::class, $identitee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $identiteeRepository->add($identitee, true);

            return $this->redirectToRoute('app_identitee_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('identitee/edit.html.twig', [
            'identitee' => $identitee,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_identitee_delete", methods={"POST"})
     */
    public function delete(Request $request, Identitee $identitee, IdentiteeRepository $identiteeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$identitee->getId(), $request->request->get('_token'))) {
            $identiteeRepository->remove($identitee, true);
        }

        return $this->redirectToRoute('app_identitee_index', [], Response::HTTP_SEE_OTHER);
    }

    public function showCard(Request $requiest, Identitee $identitee, CardRepository $cardRepository){

    }
}
