<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Evenement;
use baseBundle\Form\EventType;
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
            $event->setDateDeb(new \DateTime());
            $event->setDateFin(new \DateTime());


            $dest='Uploads/Event/'.$event->getNom().'.jpg';
            $img=$event->getImg();
            $event->setImg($dest);
            copy($img,$dest);


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
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute("show_event");
        }
        return $this->render('@base/event/change.html.twig', array("form" => $form->createView()));
    }

}
