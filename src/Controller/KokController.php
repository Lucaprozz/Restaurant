<?php

namespace App\Controller;

use App\Entity\Kok;
use App\Form\KokType;
use App\Repository\KokRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/kok")
 */
class KokController extends AbstractController
{
    /**
     * @Route("/", name="kok_index", methods={"GET"})
     */
    public function index(KokRepository $kokRepository): Response
    {
        return $this->render('kok/index.html.twig', [
            'koks' => $kokRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="kok_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kok = new Kok();
        $form = $this->createForm(KokType::class, $kok);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kok);
            $entityManager->flush();

            return $this->redirectToRoute('kok_index');
        }

        return $this->render('kok/new.html.twig', [
            'kok' => $kok,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kok_show", methods={"GET"})
     */
    public function show(Kok $kok): Response
    {
        return $this->render('kok/show.html.twig', [
            'kok' => $kok,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="kok_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Kok $kok): Response
    {
        $form = $this->createForm(KokType::class, $kok);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('kok_index');
        }

        return $this->render('kok/edit.html.twig', [
            'kok' => $kok,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="kok_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Kok $kok): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kok->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kok);
            $entityManager->flush();
        }

        return $this->redirectToRoute('kok_index');
    }
}
