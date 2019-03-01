<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/02/2019
 * Time: 01:14
 */

namespace baseBundle\Controller;


use baseBundle\Entity\Annonce;
use baseBundle\Entity\Favoris;
use baseBundle\Entity\User;
use baseBundle\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{


    public function addAction(Request $request)
    {

        $annonce = new Annonce();

        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $annonce->uploadProfilePicture();
            $em->persist($annonce);
            $em->flush();


        }
        return $this->render('@base/Annonce/Ajout.html.twig', array(
            'form' => $form->createView()));

    }

    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository('baseBundle:Annonce')->findAll();


        return $this->render('@base/Annonce/show.html.twig',
            array("Annonce" => $annonce));
    }

    public function updateAction(Request $request, $id)
    {
        $annonce = $this->getDoctrine()->getRepository(Annonce::class)->find($id);
        $annonce ->setNom($annonce ->getNom());

        $form = $this->createForm(AnnonceType::class, $annonce );
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce );
            $em->flush();
            return $this->redirectToRoute("show_Annonce");
        }
        return $this->render('@base/Annonce/update.html.twig', array("form" => $form->createView()));
    }
    public function deleteAction($id)
    {
        $em = $this->getDoctrine ()->getManager ();
        $annonce = $em->getRepository ( Annonce::class )->find ( $id );
        $em->remove ( $annonce );
        $em->flush ();
        return $this->redirectToRoute ( "show_Annonce" );

    }

    public function LikeAction($id )
    {
        $em = $this->getDoctrine()->getManager();
        $annonce = $em->getRepository ( Annonce::class )->find ( $id );

        $favorie = new Favoris();
        $user= $this->getUser();
        $favorie->setId($em->getReference(User::class,$user->getId()));
        $favorie->setIdAnnonce($em->getReference(Annonce::class,$annonce->getIdAnnonce()));
        $em->persist($favorie);
        $em->flush();

        return $this->showAction ();
    }

    public function DisLikeAction(Annonce $annonce )
    {
        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $favorie=$em->getRepository("baseBundle:Favoris")->findOneBy(
            array(
                "user" => $user,
                "annonce" => $annonce
            )
        );
        $em->remove($favorie);
        $em->flush();

        return "disliked";

    }


    public function isLiked(Annonce $annonce )
    {
        $user= $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $favorie=$em->getRepository("baseBundle:Favoris")->findOneBy(
            array(
                "user" => $user,
                "annonce" => $annonce
            )
        );
        return $favorie != null;
    }



    public function loaddataAction()
    {
        $annonces = $this->getDoctrine ()->getRepository ( 'baseBundle:Annonce' )->findAll ();
        $data = [];
        foreach ($annonces as $k => $item) {
            //$data[$k] = $item->getNom();
            array_push ($data, array('label'=>$item->getNom(), 'value'=>$item->getIdAnnonce()));
        }
        $response = array(
            'message' => 'success',
            'errors' => null,
            'result' => $data
        );

        return new JsonResponse( $response, 200 );
    }


}