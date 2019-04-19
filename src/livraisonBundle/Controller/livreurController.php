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
                return $this->render('@livraison/livreur/index.html.twig',array('idLivreur'=>$livreur->getIdLivreur(),'livraisons'=>$livraisons,'detailCmd'=>$detailCommande,'resMat'=>$ReservationMateriel));


        }

        return $this->render('@livraison/livreur/login.html.twig');
    }

    public function indexAction()
    {
        return $this->render('@livraison/livreur/index.html.twig');

    }
    public function notifAction($id)
    {
        $em = $this->getDoctrine()->getManager();
         $highest = $em->createQueryBuilder()
            ->select('MAX(e.idLivraison)')
            ->from(Livraison::class, 'e')
            ->where('e.idLivreur = ?1')
            ->setParameter(1, $id)
            ->getQuery()->getSingleScalarResult();

        $details=$this->getDoctrine()->getRepository	(DetailCommande::class)->findAll();
        $livraison = $em->getRepository(Livraison::class)->find($highest);
        $livraison->setEtat('in progress');
        $em->persist($livraison);
        $em->flush();

        return $this->render('@livraison/livreur/notif.html.twig',array('livraison'=>$livraison,'idLivreur'=>$id,'detailCmd'=>$details));

    }
    public function confirmAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $livraison = $em->getRepository(Livraison::class)->find($id);
        $livraison->setEtat('delivered');
        $em->persist($livraison);

        $livId=$livraison->getIdLivreur();

        $livreur = $em->getRepository(Livreur::class)->find($livId);
        $livreur->setEtat('disponible');
        $em->persist($livreur);
        $em->flush();


        $detailCommande=$this->getDoctrine()->getRepository	(DetailCommande::class)->findAll();
        $ReservationMateriel=$this->getDoctrine()->getRepository	(ReservationMateriel::class)->findAll();
        $livraisons = $this->getDoctrine()->getRepository	(Livraison::class)->findAll();


            return $this->render('@livraison/livreur/index.html.twig',array('idLivreur'=>$livreur->getIdLivreur(),'livraisons'=>$livraisons,'detailCmd'=>$detailCommande,'resMat'=>$ReservationMateriel));


    }

}
