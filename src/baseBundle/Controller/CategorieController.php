<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/02/2019
 * Time: 11:55
 */

namespace baseBundle\Controller;


use baseBundle\Entity\Categorie;

use baseBundle\Form\CategorieType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function addcatAction(Request $request)
    {
        //1-préparation d'un objet vide
        $categorie = new Categorie();
        //2-création du formulaire
        $form = $this->createForm(Categorietype::class, $categorie);

        $form->handleRequest($request);
        //validation du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //7-persister les donnes dans L'ORM (doctrine)
            $em->persist($categorie);
            $em->flush();

            $this->addFlash(
                'notice',
                'Post Edited Successfully!'
            );
            return $this->redirectToRoute('show_cat');


        }
        return $this->render('@base/matriels/addcat.html.twig', array(
            'form' => $form->createView()));

    }

    public function showcatAction()
    {

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('baseBundle:Categorie')->findAll();


        return $this->render('@base/matriels/showcat.html.twig',
            array("categories" => $categories));
    }

    public function updatecatAction(Request $request, $id)
    {
        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->find($id);
        $categorie->setNom($categorie->getNom());

        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute("show_cat");
        }
        return $this->render('@base/matriels/updatecat.html.twig', array("form" => $form->createView()));
    }

    public function deletecatAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository(Categorie::class)->find($id);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute("show_cat");


    }
}