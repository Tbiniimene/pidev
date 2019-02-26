<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 23/02/2019
 * Time: 01:14
 */

namespace baseBundle\Controller;


use baseBundle\Entity\Materiels;
use baseBundle\Form\MaterielsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaterielsController extends Controller
{


    public function addAction(Request $request)
    {

        $matriel = new Materiels();

        $form = $this->createForm(Materielstype::class, $matriel);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $matriel->uploadProfilePicture();
            $em->persist($matriel);
            $em->flush();


        }
        return $this->render('@base/matriels/add.html.twig', array(
            'form' => $form->createView()));

    }

    public function showAction()   //afiche liste de matrielle
    {

        $em = $this->getDoctrine()->getManager();
        $matriels = $em->getRepository('baseBundle:Materiels')->findAll();


        return $this->render('@base/matriels/show.html.twig',
            array("matriels" => $matriels));
    }

    public function updatematAction(Request $request, $id)
    {
        $matriel = $this->getDoctrine()->getRepository(Materiels::class)->find($id);
        $matriel ->setNom($matriel ->getNom());

        $form = $this->createForm(MaterielsType::class, $matriel );
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($matriel );
            $em->flush();
            return $this->redirectToRoute("show_matriels");
        }
        return $this->render('@base/matriels/updatemat.html.twig', array("form" => $form->createView()));
    }
    public function deletematAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $matriel= $em->getRepository(Materiels::class)->find($id);
        $em->remove($matriel);
        $em->flush();
        return $this->redirectToRoute("show_matriels");


    }
}