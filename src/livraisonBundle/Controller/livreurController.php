<?php

namespace livraisonBundle\Controller;

use baseBundle\Entity\DetailCommande;
use baseBundle\Entity\Livraison;
use baseBundle\Entity\Livreur;
use baseBundle\Entity\ReservationMateriel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class livreurController extends Controller
{
    public function loginAction()
    {
        if(isset($_POST['username']) && isset($_POST['pass']))
        {
            $name=$_POST['username'];
            $pass=$_POST['pass'];

            $livreur=$this->getDoctrine()->getRepository(Livreur::class)->findOneBy(['login'=>$name,'password'=>$pass]);
            $detailCommande=$this->getDoctrine()->getRepository	(DetailCommande::class)->findAll();
            $ReservationMateriel=$this->getDoctrine()->getRepository	(ReservationMateriel::class)->findAll();
            $livraisons = $this->getDoctrine()->getRepository	(Livraison::class)->findAll();

            if($livreur)
                return $this->render('@livraison/livreur/index.html.twig',array('idLivreur'=>$livreur->getIdLivreur(),'livraisons' => $livraisons,'detailCmd'=>$detailCommande,'resMat'=>$ReservationMateriel));


        }

        return $this->render('@livraison/livreur/login.html.twig');
    }

    public function indexAction()
    {
        return $this->render('@livraison/livreur/index.html.twig');

    }


}
