<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Couffin;
use baseBundle\Entity\DetailCouffin;
use baseBundle\Entity\Produits;

use baseBundle\Form\CouffinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CouffinController extends Controller
{

    public function afficheCouffinAction()
    {
        $couffin = $this->getDoctrine()->getRepository	(Couffin::class)->findAll();
        return $this->render('@base/couffin/couffin.html.twig', array(
            'couffin' => $couffin
        ));

    }

    public function deleteCouffinAction($idcouffin)
    {
        $em = $this->getDoctrine()->getManager();
        $couffin = $em->getRepository(Couffin::class)->find($idcouffin);
        $em->remove($couffin);
        $em->flush();
        return $this->redirectToRoute('affiche_couffin');
    }

    public function ajoutCouffinAction(Request $request)
    {
        //1-préparation d'un objet vide
        $Couffin = new Couffin();

        //2-création du formulaire
        $form = $this->createForm(CouffinType::class, $Couffin);

        //4-recuperation des donnees
        $form = $form->handleRequest($request);

        //5-validation du formulaire
        if ($form->isValid()) {
            //6-creation de l'entity manager
            $em = $this->getDoctrine()->getManager();
            //7-persister les donnes dans L'ORM (doctrine)

            $em->persist($Couffin);

            //8-sauvgarde des donnes dans la base des donnes
            $em->flush();
            return $this->redirectToRoute('affiche_couffin');
        }
        return $this->render('@base/Couffin/ajout.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function editCouffinAction(Request $request,$idcouffin) {
        $Couffin= $this->getDoctrine()->getRepository(Couffin::class)->find($idcouffin);
        $form= $this->createForm(CouffinType::class,$Couffin);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($Couffin);
            $em->flush();
            return $this->redirectToRoute("affiche_couffin");
        }
        return $this->render("@base/Couffin/edit.html.twig",
            array("form"=>$form->createView()));
    }


    public function afficheProduitsCouffinAction($idCouffin)
    {
        $detailCouffin=new DetailCouffin();


        if(isset($_POST['idProd']) && isset($_POST['qteProd']) )
        {
            $em= $this->getDoctrine()->getManager();

            $idProduit=$_POST['idProd'];
            $qte=$_POST['qteProd'];

            $Couffin= $this->getDoctrine()->getRepository(Couffin::class)->find($idCouffin);
            $Couffin->setIdDc($em->getReference(DetailCouffin::class,$idCouffin));

            $detailCouffin->setIdDc($idCouffin);
            $detailCouffin->setIdProduit($em->getReference(Produits::class,$idProduit));
            $detailCouffin->setQte($qte);


            $em->persist($Couffin);
            $em->persist($detailCouffin);

            $em->flush();
        }


        $Produits = $this->getDoctrine()->getRepository	(Produits::class)->findAll();

        return $this->render('@base/Couffin/produitCouffin.html.twig', array(
            'Produits'=>$Produits,'idcouffin'=>$idCouffin
        ));

    }

}
