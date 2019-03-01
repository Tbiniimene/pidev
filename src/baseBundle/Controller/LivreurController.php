<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Commande;
use baseBundle\Entity\DetailCommande;
use baseBundle\Entity\Disponibilite;
use baseBundle\Entity\Livraison;
use baseBundle\Entity\Livreur;
use baseBundle\Entity\ReservationMateriel;
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

            $highest_id = $em->createQueryBuilder()
                ->select('MAX(e.idLivreur)')
                ->from(Livreur::class, 'e')
                ->getQuery()
                ->getSingleScalarResult();
            $highest_id++;

            $login=$livreur->getNom().$livreur->getPrenom().$highest_id;

            $livreur->setLogin($login);
            $livreur->setPassword($this->generatePass($livreur->getNom().$livreur->getPrenom()));

            $em->persist($livreur);
            $em->flush();
            return $this->redirectToRoute('admin_listeLivreur');
        }
        return $this->render('@base/livraison/livreur.html.twig', array(
            'form' => $form->createView()
        ));

    }
    public function generatePass($source)
    {
        return substr(str_shuffle(strtolower(sha1(rand() . $source))),0, 8);

    }
    public function listeLivreurAction()
    {
        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/livraison/listeLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

    public function supprimerLivreurAction()
    {


        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/livraison/supprimerLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

    public function deleteLivreurAction($id)
    {

        if($id!='null')
        {
            $livs = explode("-", $id);
            foreach($livs as $l)
            {
                $em = $this->getDoctrine()->getManager();
                $livreur = $em->getRepository(Livreur::class)->find($l);
                $em->remove($livreur);
                $em->flush();
            }

        }

        return $this->redirectToRoute('admin_supprimerLivreur');

    }

    public function modifierLivreurAction()
    {


        if (isset($_POST["idLiv"]) && isset($_POST["nomLiv"]) && isset($_POST["prenomLiv"]) && isset($_POST["etatLiv"]) && isset($_POST["telLiv"]) && isset($_POST["localisationLiv"]))
        {
            $em = $this->getDoctrine()->getManager();
            $id=$_POST['idLiv'];
            $livreur = $em->getRepository(Livreur::class)->find($id);
            $nom = $_POST["nomLiv"];
            $prenom = $_POST["prenomLiv"];
            $etat = $_POST["etatLiv"];
            $tel = $_POST["telLiv"];
            $local = $_POST["localisationLiv"];
            $livreur->setNom($nom);
            $livreur->setPrenom($prenom);
            $livreur->setEtat($etat);
            $livreur->setTel($tel);
            $livreur->setLocalisation($local);


            $em->persist($livreur);
            $em->flush();

        }

        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/livraison/modifierLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));


    }
    public function ajouterDispoAction()
    {

        if(isset($_POST['selectedDays']) && isset($_POST['idLiv']))
        {
            $em = $this->getDoctrine()->getManager();



            $disp=new Disponibilite();
            $dates=$_POST['selectedDays'];
            $id=$_POST['idLiv'];

            $dispLiv = $em->getRepository(Disponibilite::class)->findOneBy ( ['idLivreur' => $id]);

            if($dispLiv==null)
            {

                $disp->setDateDispo($dates);
                //$em->gerReference(Livreur::class,$id)
                $disp->setIdLivreur($em->getReference(Livreur::class,$id));

                $em->persist($disp);
            }
            else
            {
                $dispLiv->setDateDispo($dates);
               // $dispLiv->setIdLivreur($em->getReference(Livreur::class,$id));

                $em->persist($dispLiv);


            }

            $em->flush();



        }

        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        $dispos = $this->getDoctrine()->getRepository	(Disponibilite::class)->findAll();

        return $this->render('@base/livraison/ajouterDispo.html.twig', array(
            'livreurs' => $livreurs,'dispos'=>$dispos
        ));

    }
    public function suppDispoAction()
    {
        if(isset($_POST['idLiv']))
        {
            $id=$_POST['idLiv'];
            $em = $this->getDoctrine()->getManager();
            $dispLiv = $em->getRepository(Disponibilite::class)->findOneBy ( ['idLivreur' => $id]);
            $em->remove($dispLiv);
            $em->flush();


            return $this->redirectToRoute('admin_ajouterDispo');


        }

        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        $dispos = $this->getDoctrine()->getRepository	(Disponibilite::class)->findAll();

        return $this->render('@base/livraison/suppDispo.html.twig', array(
            'livreurs' => $livreurs,'dispos'=>$dispos
        ));

    }
    public function mapAction()
    {

        return $this->render('@base/livraison/map.html.twig'
        );

    }
    public function ajouterLivAction()
    {
        if(isset($_POST['localisationLiv']) && isset($_POST['totLiv']))
        {
            $em = $this->getDoctrine()->getManager();
            $livraison=new Livraison();

            $idLiv=$_POST['localisationLiv'];
            $tot=$_POST['totLiv'];
            if(isset($_POST['rr']))
            {
                $idRes=$_POST['rr'];
                $livraison->setIdReservation($em->getReference(ReservationMateriel::class,$idRes));

            }
            if( isset($_POST['cr']))
            {

                $idCmd=$_POST['cr'];
                $livraison->setIdCommande($em->getReference(Commande::class,$idCmd));

            }

            $livraison->setIdLivreur($em->getReference(Livreur::class,$idLiv));
            $livraison->setPrix($tot);
            $livraison->setEtat("pending");

            $livreur=$em->getRepository(Livreur::class)->find($idLiv);
            $livreur->setEtat('non disponible');

            $em->persist($livreur);
            // From your controller or service
            $data = array(
                'livreur'=>$idLiv,
                'message' => "New Delivery assigned to you !"
            );
            $pusher = $this->get('mrad.pusher.notificaitons');
            $pusher->trigger($data);

            $em->persist($livraison);
            $em->flush();

            return $this->redirectToRoute('admin_showLivraison');

        }
        $livraisons=$this->getDoctrine()->getRepository	(Livraison::class)->findAll();
        $commands=$this->getDoctrine()->getRepository	(Commande::class)->findAll();
        $reservations=$this->getDoctrine()->getRepository	(ReservationMateriel::class)->findAll();
        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();

        return $this->render('@base/livraison/ajouterLivraison.html.twig',array('commands'=>$commands,'reservations'=>$reservations,'livreurs'=>$livreurs,'livraisons'=>$livraisons)
        );

    }
    public function showLivAction()
    {
        $detailCommande=$this->getDoctrine()->getRepository	(DetailCommande::class)->findAll();
        $ReservationMateriel=$this->getDoctrine()->getRepository	(ReservationMateriel::class)->findAll();
        $livraisons = $this->getDoctrine()->getRepository	(Livraison::class)->findAll();

        return $this->render('@base/livraison/showLivraison.html.twig', array(
            'livraisons' => $livraisons,'detailCmd'=>$detailCommande,'resMat'=>$ReservationMateriel
        ));

    }
}
