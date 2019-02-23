<?php

namespace baseBundle\Controller;
use baseBundle\Entity\Formateur;
use baseBundle\Form\FormateurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormationController extends Controller
{
    public function viewAction()
    {
        $formateurs=$this->getDoctrine()
            ->getRepository(Formateur::class)
            ->findAll();
        return $this->render('@base/Formation/showformateur.html.twig',array('f'=>$formateurs));
    }
    public function createAction(Request $request)
    {
        $formateur=new Formateur();
        $form=$this->createForm(FormateurType::class,$formateur);
        $form=$form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($formateur); $em->flush();
            return $this->redirectToRoute("formateur_afficherformateur");
        }
        return $this->render('@base/Formation/Ajouterformateur.html.twig',array('form'=>$form->createView()));
    }
    public function supprimerAction($id){
        $em= $this->getDoctrine()->getManager();
        $formateur= $this->getDoctrine()->getRepository(Formateur::class)->find($id);
        $em->remove($formateur);
        $em->flush();
        return $this->redirectToRoute("formateur_afficherformateur");
    }

    public function modifierAction(Request $request,$id) {
        $formateur= $this->getDoctrine()->getRepository(Formateur::class)->find($id);
        $form= $this->createForm(FormateurType::class,$formateur);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $em->persist($formateur);
            $em->flush();
            return $this->redirectToRoute("formateur_afficherformateur");
        }
        return $this->render("@base/Formation/modif.html.twig",
            array("form"=>$form->createView()));
    }

}
