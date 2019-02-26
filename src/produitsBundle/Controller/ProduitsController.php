<?php

namespace produitsBundle\Controller;

use baseBundle\Entity\Produits;
use baseBundle\Entity\Couffin;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends Controller
{
    public function shopAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Couffin = $em->getRepository('baseBundle:Couffin')->findAll();
        $Produits = $em->getRepository('baseBundle:Produits')->findAll();

        return $this->render('@produits/Produits/shop.html.twig',
            array("Couffin" => $Couffin, "Produits" => $Produits));
    }

    public function detailAction(Request $request, $idProduit)
    {
        $Produits = $this->getDoctrine()->getRepository(Produits::class)->find($idProduit);

        return $this->render('@produits/Produits/detail.html.twig', array("Produits" => $Produits));
    }




}
