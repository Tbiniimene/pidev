<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Produits;
use baseBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends Controller
{


    public function afficheAction()
    {
        $Produits = $this->getDoctrine()->getRepository	(Produits::class)->findAll();
        return $this->render('@base/Produits/produit.html.twig', array(
            'Produits' => $Produits
        ));

    }

    public function deleteAction($idProduit)
    {
        $em = $this->getDoctrine()->getManager();
        $Produits = $em->getRepository(Produits::class)->find($idProduit);
        $em->remove($Produits);
        $em->flush();
        return $this->redirectToRoute("affiche");

    }

    public function ajoutAction(Request $request)
    {
        //1-préparation d'un objet vide
        $Produits = new Produits();

        //2-création du formulaire
        $form = $this->createForm(ProduitsType::class, $Produits);

        //4-recuperation des donnees
        $form = $form->handleRequest($request);

        //5-validation du formulaire
        if ($form->isValid()) {
            //6-creation de l'entity manager
            $em = $this->getDoctrine()->getManager();
            //7-persister les donnes dans L'ORM (doctrine)

            $dest='img/bg-img/'.$Produits->getNom().'.jpg';
            $img=$Produits->getImage();
            $Produits->setImage($dest);
            copy($img,$dest);
            $em->persist($Produits);

            //8-sauvgarde des donnes dans la base des donnes
            $em->flush();
            return $this->redirectToRoute('affiche');
        }
        return $this->render('@base/Produits/ajout.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function editAction(Request $request,$idProduit) {
        $Produits= $this->getDoctrine()->getRepository(Produits::class)->find($idProduit);
        $form= $this->createForm(ProduitsType::class,$Produits);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($Produits);
            $em->flush();
            return $this->redirectToRoute("affiche");
        }
        return $this->render("@base/Produits/edit.html.twig",
            array("form"=>$form->createView()));
    }


    public function shopAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Couffin = $em->getRepository('baseBundle:Couffin')->findAll();
        $Produits = $em->getRepository('baseBundle:Produits')->findAll();

        return $this->render('@base/Default/shopp.html.twig',
            array("Couffin" => $Couffin, "Produits" => $Produits));
    }

    public function detailAction(Request $request, $idProduit)
    {
        $Produits = $this->getDoctrine()->getRepository(Produits::class)->find($idProduit);

        return $this->render('@Base/Default/detailp.html.twig', array("Produits" => $Produits));
    }

}
