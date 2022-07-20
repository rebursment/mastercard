<?php

namespace App\Controller;

use App\Form\AdminFormType;
use App\Repository\IdentiteeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminAccessController extends AbstractController
{
    /**
     * @Route("/admin/access", name="app_admin_access")
     */
    public function index(Request $request, IdentiteeRepository $identiteeRepository): Response
    {
        $form1 = $this->createForm(AdminFormType::class);
        $form1->handleRequest($request);
        if($form1->isSubmitted()) {
            return $this->render('identitee/index.html.twig', [
                'identitees' => $identiteeRepository->findAll(),
            ]);
//            dd($form->getData()['code']);
        }
        return $this->render('admin_access/index.html.twig', [
            'controller_name1' => 'AdminAccessController',
            'form' => $form1->createView(),
        ]);
    }
}
