<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Livreur;
use baseBundle\Form\LivreurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LivreurController extends Controller
{

    public function livreurAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $livreur=new Livreur();
        $form = $this->createForm(LivreurType::class, $livreur);

        $form = $form->handleRequest($request);

        if ($form->isValid()) {
            $livreur->setEtat("disponible");
            $em->persist($livreur);
            $em->flush();
            return $this->redirectToRoute('admin_listeLivreur');
        }
        return $this->render('@base/Admin/livreur.html.twig', array(
            'form' => $form->createView()
        ));

    }
    public function listeLivreurAction()
    {
        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/Admin/listeLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

    public function supprimerLivreurAction()
    {


        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/Admin/supprimerLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

    public function deleteLivreurAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $livreur = $em->getRepository(Livreur::class)->find($id);
        $em->remove($livreur);
        $em->flush();
        return $this->redirectToRoute('admin_supprimerLivreur');

    }

}
