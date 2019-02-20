<?php

namespace baseBundle\Controller;

use baseBundle\Entity\Livreur;
use baseBundle\Form\LivreurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function a404Action()
    {
        return $this->render('@base/Admin/404.html.twig');
    }

    public function blankAction()
    {
        return $this->render('@base/Admin/blank.html.twig');
    }

    public function chartsAction()
    {
        return $this->render('@base/Admin/charts.html.twig');
    }

    public function passAction()
    {
        return $this->render('@base/Admin/forgot-password.html.twig');
    }

    public function indexAction()
    {
        return $this->render('@base/Admin/index.html.twig');
    }

    public function loginAction()
    {
        return $this->render('@base/Admin/login.html.twig');
    }

    public function registerAction()
    {
        return $this->render('@base/Admin/register.html.twig');
    }

    public function tablesAction()
    {
        return $this->render('@base/Admin/tables.html.twig');
    }
    public function livreurAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $livreur=new Livreur();
        $form = $this->createForm(LivreurType::class, $livreur);

        $form = $form->handleRequest($request);

        if ($form->isValid()) {
            $livreur->setEtat("disponible");
            $em->persist($livreur);
            $em->flush();
            return $this->redirectToRoute('admin_listeLivreur');
        }
        return $this->render('@base/Admin/livreur.html.twig', array(
            'form' => $form->createView()
        ));

    }
    public function listeLivreurAction()
    {
        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/Admin/listeLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

    public function supprimerLivreurAction()
    {

       /* $em = $this->getDoctrine()->getManager();
        $livreur = $em->getRepository(Livreur::class)->find($id);
        $em->remove($livreur);
        $em->flush();
        return $this->redirectToRoute('admin_listeLivreur');
*/
        $livreurs = $this->getDoctrine()->getRepository	(Livreur::class)->findAll();
        return $this->render('@base/Admin/supprimerLivreur.html.twig', array(
            'livreurs' => $livreurs
        ));

    }

}
