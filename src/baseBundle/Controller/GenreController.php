<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/02/2019
 * Time: 11:55
 */

namespace baseBundle\Controller;


use baseBundle\Entity\Genre;
use baseBundle\Form\GenreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GenreController extends Controller
{
    public function addGenreAction(Request $request)
    {
        //1-préparation d'un objet vide
        $genre = new genre();
        //2-création du formulaire
        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);
        //validation du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            //7-persister les donnes dans L'ORM (doctrine)
            $em->persist($genre);
            $em->flush();

            $this->addFlash(
                'notice',
                'Post Edited Successfully!'
            );
            return $this->redirectToRoute('show_genre');


        }
        return $this->render('@base/Annonce/AddGenre.html.twig', array(
            'form' => $form->createView()));

    }

    public function showGenreAction()
    {

        $em = $this->getDoctrine()->getManager();
        $genre = $em->getRepository('baseBundle:Genre')->findAll();


        return $this->render('@base/Annonce/show_genre.html.twig',
            array("Genre" => $genre));
    }

    public function updateGenreAction(Request $request, $id)
    {

        $genre = $this->getDoctrine()->getRepository(Genre::class)->find($id);
        $form = $this->createForm(GenreType::class, $genre);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();
            return $this->redirectToRoute("show_genre");
        }
        return $this->render('@base/Annonce/updateGenre.html.twig', array("form" => $form->createView()));
    }

    public function deleteGenreAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $genre = $em->getRepository(Genre::class)->find($id);
        $em->remove($genre);
        $em->flush();
        return $this->redirectToRoute("show_genre");


    }
}