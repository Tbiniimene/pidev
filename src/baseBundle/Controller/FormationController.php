<?php

namespace baseBundle\Controller;
use baseBundle\Entity\ParticipantFormation;

use baseBundle\Entity\User;

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

        //$par=new ParticipantFormation();
        $em= $this->getDoctrine()->getManager();

        $formation= $this->getDoctrine()->getRepository(Formation::class)->find($id);
        //wait here for a sec

        //$partfor= $this->getDoctrine()->getRepository(ParticipantFormation::class)->findBy(array('PFormation'=>$par->getPFormation()));

        $em->remove($formation);
        //$em->remove($partfor);

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


    public function loginAction($idFormation)
    {

        $us=new User();
        if (isset($_POST['cin']) && isset($_POST['password'])  ) {

            $cin=$_POST['cin'];
            $password=$_POST['password'];

                $em = $this->getDoctrine()->getManager();

                    /* $query=$em->createQuery('select s from baseBundle:User s
                    where s.cin = :ccin AND s.password= :ppassword ')
                ->setParameter('ccin',$cin)
                ->setParameter('ppassword',$password);
                    $query->getResults();*/

           // $user= $this->entityManager->getRepository('baseBundle:User')->findBy(['ccin' => $cin]);

            //$user =$em->getRepository(User::class)->findBy((array('cin'=>$us->getCin())));
            $user =$em->getRepository(User::class)->find($cin);
             if (!$user) {

                 return $this->render('@base/Formation/participer.html.twig', array(
                     'idformation' => $idFormation
                 ));
            }
            else{

                $pe=new ParticipantFormation();

                  $pe->setPFormation($em->getReference(Formation::class,$idFormation));

                    $pe->setCin($cin);
                    $pe->setNom($us->getUsername());
                    $pe->setPrenom($us->getUsernameCanonical());
                    //$pe->setTel($us->getTel());

                $formation=$em->getRepository(Formation::class)->find($idFormation);
                $formation->setnbmax($formation->getnbmax() - 1);
                $em->persist($formation);
                $em->persist($pe);
                $em->flush();

                return $this->redirectToRoute('base_forming');
            }

        }
          return $this->render('@base/Formation/login.html.twig', array(
            'idformation' => $idFormation
        ));

    }
    public function participerAction($idFormation)
    {
        $pf=new ParticipantFormation();
        if (isset($_POST['cin']) && isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Tel'])  ) {
         $cin=$_POST['cin'];
         $nom=$_POST['Nom'];
         $prenom=$_POST['Prenom'];
         $tel=$_POST['Tel'];
        $em = $this->getDoctrine()->getManager();
        $pf->setPFormation($em->getReference(Formation::class,$idFormation));
        $pf->setCin($cin);
        $pf->setNom($nom);
        $pf->setPrenom($prenom);
        $pf->setTel($tel);

         $formation=$em->getRepository(Formation::class)->find($idFormation);
            $formation->setnbmax($formation->getnbmax() - 1);
       $em->persist($formation);
       $em->persist($pf);
       $em->flush();
                     return $this->redirectToRoute('base_forming');
        }

        return $this->render('@base/Formation/participer.html.twig', array(
            'idformation' => $idFormation
        ));

    }

    public function showwAction(Formation $Formation)
    {

        return $this->render('@base/Formation/show.html.twig', array(
            'Formation' => $Formation,
        ));
    }


}
