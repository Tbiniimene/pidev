<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Evenement;
use baseBundle\Entity\ParticipantsEvenement;
use baseBundle\Entity\Stand;
use baseBundle\Form\EventType;
use baseBundle\Form\StandType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function showAction()
    {
        $aa = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        return $this->render('@base/event/show.html.twig', array(
            'aa' => $aa
        ));
    }

    public function addAction(Request $request)
    {
        //1-préparation d'un objet vide
        $event = new Evenement();

        //2-création du formulaire
        $form = $this->createForm(EventType::class, $event);

        //4-recuperation des donnees
        $form = $form->handleRequest($request);

        //5-validation du formulaire
        if ($form->isValid()) {
            //6-creation de l'entity manager
            $em = $this->getDoctrine()->getManager();

            $dest=$event->getNom().'.jpg';
            $img=$event->getImg();
            $event->setImg($dest);
            copy($img,'Uploads/Event/'.$dest);

            //7-persister les donnes dans L'ORM (doctrine)
            $em->persist($event);
            //8-sauvgarde des donnes dans la base des donnes
            $em->flush();
            return $this->redirectToRoute('add_event');
        }
        return $this->render('@base/event/add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository(Evenement::class)->find($id);
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("show_event");
    }

    public function changeAction(Request $request, $id)
    {
        $event = $this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $dest=$event->getNom().'.jpg';
            $img=$event->getImg();
            $event->setImg($dest);
            copy($img,'Uploads/Event/'.$dest);
            unlink($img);
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute("show_event");
        }
        return $this->render('@base/event/change.html.twig', array("form" => $form->createView()));
    }

    public function standAction()
    {
        $aa = $this->getDoctrine()->getRepository(Stand::class)->findAll();
        return $this->render('@base/event/stand.html.twig', array(
            'aa' => $aa
        ));
    }

    public function standajAction(Request $request)
    {
        //1-préparation d'un objet vide
        $stand = new Stand();
        //2-création du formulaire
        $form = $this->createForm(StandType::class, $stand);
        //4-recuperation des donnees
        $form = $form->handleRequest($request);
        //5-validation du formulaire
        if ($form->isValid()) {
            //6-creation de l'entity manager
            $em = $this->getDoctrine()->getManager();
            //7-persister les donnes dans L'ORM (doctrine)
            $em->persist($stand);
            //8-sauvgarde des donnes dans la base des donnes
            $em->flush();
            return $this->redirectToRoute('add_stand');
        }
        return $this->render('@base/event/standaj.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function parAction()
    {
        $aa = $this->getDoctrine()->getRepository(ParticipantsEvenement::class)->findAll();
        return $this->render('@base/event/par.html.twig', array(
            'aa' => $aa
        ));
    }

    public function rentStandAction($idEvent)
    {
        $pe=new ParticipantsEvenement();
        //5-validation du formulaire
        if (isset($_POST['cin']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Tel']) && isset($_POST['idStand']) ) {

            $cin=$_POST['cin'];
            $nom=$_POST['Nom'];
            $prenom=$_POST['Prenom'];
            $tel=$_POST['Tel'];
            $idStand=$_POST['idStand'];

            $em = $this->getDoctrine()->getManager();
            $pe->setIdEvenement($em->getReference(Evenement::class,$idEvent));
            $pe->setCinParticipant($cin);
            $pe->setNom($nom);
            $pe->setPrenom($prenom);
            $pe->setTel($tel);
            $pe->setIdStand($em->getReference(Stand::class,$idStand));

            $stand = $em->getRepository(Stand::class)->find($idStand);
            $stand->setStatutStand('0');

            $event=$em->getRepository(Evenement::class)->find($idEvent);
            $event->setnbStand($event->getnbStand() - 1);

            $em->persist($stand);
            $em->persist($event);
            $em->persist($pe);
            $em->flush();

            return $this->redirectToRoute('base_event');
        }
        $stands = $this->getDoctrine()->getRepository(Stand::class)->findBy(['idEvent' => $idEvent,'statutStand'=>'1']);

        return $this->render('@base/event/rent.html.twig', array(
            'idEvent' => $idEvent,'stands'=>$stands
        ));

    }

    public function testAction()
    {
        return $this->render('@base/event/test.html.twig');
    }

    public function myStandAction()
    {
        $aa = $this->getDoctrine()->getRepository(ParticipantsEvenement::class)->findAll();
        return $this->render('@base/event/myStand.html.twig', array(
            'aa' => $aa
        ));
    }

    public function cancelAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cancel = $em->getRepository(ParticipantsEvenement::class)->findby(['idStand' => $id]);
        $stand = $em->getRepository(Stand::class)->find($id);
        $stand->setStatutStand('1');
        $em->remove($cancel[0]);
        $em->persist($stand);
        $em->flush();
        return $this->redirectToRoute("myStand");
    }
}
