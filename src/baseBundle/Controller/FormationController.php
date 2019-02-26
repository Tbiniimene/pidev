<?php

namespace baseBundle\Controller;
use baseBundle\Entity\ParticipantFormation;
use baseBundle\Entity\Formateur;
use baseBundle\Entity\Formation;
use baseBundle\Form\FormateurType;
use baseBundle\Form\FormationType;
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

    public function afficherFormationAction()
    {
        $formations=$this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();
        return $this->render('@base/Formation/showformation.html.twig',array('f'=>$formations));
    }

    public function createfAction(Request $request)
    {
        $formations=new Formation();
        $form=$this->createForm(FormationType::class,$formations);
        $form=$form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();

        //controlle sur le saisie de l'addresse

            $dest='Uploads/Event/'.$formations->getNom().'.jpg';
            $img=$formations->getImg();
            $formations->setImg($dest);
            copy($img,$dest);

            $em->persist($formations); $em->flush();
            return $this->redirectToRoute("afficherformation");
        }
        return $this->render('@base/Formation/Ajouterformation.html.twig',array('form'=>$form->createView()));
    }


    public function supprimerfAction($id){
        $em= $this->getDoctrine()->getManager();
        $formation= $this->getDoctrine()->getRepository(Formation::class)->find($id);
        $em->remove($formation);
        $em->flush();
        return $this->redirectToRoute("afficherformation");
    }

    public function modifierfAction(Request $request,$id) {
        $formations= $this->getDoctrine()->getRepository(Formation::class)->find($id);
        $form= $this->createForm(FormationType::class,$formations);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em= $this->getDoctrine()->getManager();
            $dest='Uploads/Event/'.$formations->getNom().'.jpg';
            $img=$formations->getImg();
            $formations->setImg($dest);
            copy($img,$dest);
            unlink($img);
            $em->persist($formations);
            $em->flush();
            return $this->redirectToRoute("afficherformation");
        }
        return $this->render("@base/Formation/modifformation.html.twig",
            array("form"=>$form->createView()));
    }



    public function participerAction($id)
    {
        $pe=new ParticipantFormation();
        //5-validation du formulaire
        if (isset($_POST['cin']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Tel'])  ) {

            $cin=$_POST['cin'];
            $nom=$_POST['Nom'];
            $prenom=$_POST['Prenom'];
            $tel=$_POST['Tel'];


            $em = $this->getDoctrine()->getManager();
            $pe->setPFormation($em->getReference(Formation::class,$id));
            $pe->setCin($cin);
            $pe->setNom($nom);
            $pe->setPrenom($prenom);
            $pe->setTel($tel);



            $formation=$em->getRepository(Formation::class)->find($id);
            $formation->setnbmax($formation->getnbmax() - 1);


            $em->persist($formation);
            $em->persist($pe);
            $em->flush();

            return $this->redirectToRoute('base_forming');
        }


        return $this->render('@base/Formation/participer.html.twig', array(
            'idformation' => $id
        ));

    }

}
