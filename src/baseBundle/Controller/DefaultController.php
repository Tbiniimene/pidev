<?php

namespace baseBundle\Controller;
use baseBundle\Entity\Formation;
use baseBundle\Entity\Evenement;
use baseBundle\Entity\Materiels;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@base/Default/index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('@base/Default/about.html.twig');
    }

    public function blogAction()
    {
        return $this->render('@base/Default/blog.html.twig');
    }

    public function cartAction()
    {
        return $this->render('@base/Default/cart.html.twig');
    }

    public function checkoutAction()
    {
        return $this->render('@base/Default/checkout.html.twig');
    }

    public function contactAction()
    {
        return $this->render('@base/Default/contact.html.twig');
    }

    public function portfolioAction()
    {
        return $this->render('@base/Default/portfolio.html.twig');
    }

    public function shopAction(Request $request)
    {

            $em = $this->getDoctrine()->getManager();
            $categories = $em->getRepository('baseBundle:Categorie')->findAll();
            $matriels = $em->getRepository('baseBundle:Materiels')->findAll();

            $matrielspaginator  = $this->get('knp_paginator')->paginate($matriels, $request->query->getInt('page', 1), 2);

            return $this->render('@base/Default/shop.html.twig',
                array("categories" => $categories, "matriels" => $matrielspaginator));

    }

    public function shop_detailsAction(Request $request, $id)
    {
        $matriel = $this->getDoctrine()->getRepository(Materiels::class)->find($id);
        $categories = $this->getDoctrine()->getRepository('baseBundle:Categorie')->findAll();

        $list_materiels = $this->getDoctrine()->getRepository('baseBundle:Materiels')->findAll();
        //
        $open_popup = false;
        $commande_form = $this->createFormBuilder()
            ->add('quantite', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                ],
                'attr' => ['class' => 'form-control form-control-sm'],
            ])

            ->add('price', HiddenType::class, array('attr' => array('class' => 'hidden', 'value' => $matriel->getPrix())))
            ->add('add_to_cart', SubmitType::class, array('label' => 'Add to cart','attr'
            => array('class' => 'btn btn-outline-primary text-uppercase', 'style' => 'margin-right:10px')))
            ->getForm();


            $commande_form->handleRequest($request);
            if($commande_form->isSubmitted() && $commande_form->isValid()){
//recuperer ssesion
                $session = $this->get('session');

                $my_session = $session->get($matriel->getIdMatriel());
                if(isset($my_session) && !empty($my_session)){
                    if($my_session['quantite'] !== 0){
                        $sess_quantite = $my_session['quantite'] + $commande_form['quantite']->getData();
                        $sess_price = $commande_form['price']->getData();
                    }else{
                        $sess_quantite = $commande_form['quantite']->getData();
                        $sess_price = $commande_form['price']->getData();
                    }
                    $session->set($matriel->getIdMatriel(), array('quantite' => $sess_quantite, 'price' => $sess_price));
                }else{
                    $session->set($matriel->getIdMatriel(), array('quantite' => $commande_form['quantite']->getData(), 'price' => $commande_form['price']->getData()));
                }

                $open_popup = true;

                return $this->render('@base/Default/shop-details.html.twig', array("categories" => $categories,"matriels" => $matriel, "commande_form" => $commande_form->createView(), 'sessions' => $this->get('session'), 'list_materiels' => $list_materiels, 'open_popup' => $open_popup));


            }

        return $this->render('@base/Default/shop-details.html.twig', array("categories" => $categories,"matriels" => $matriel, "commande_form" => $commande_form->createView(), 'sessions' => $this->get('session'), 'list_materiels' => $list_materiels, 'open_popup' => $open_popup));
    }

    public function portfolio_detailsAction()
    {
        return $this->render('@base/Default/single-portfolio.html.twig');
    }

    public function blog_detailsAction()
    {
        return $this->render('@base/Default/single-post.html.twig');
    }

    public function eventAction()
    {

        $aa = $this->getDoctrine()->getRepository(Evenement::class)->findAll();

        return $this->render('@base/Default/event.html.twig', array(
            'aa' => $aa
        ));
    }

    public function formingAction()
    {
        $formations=$this->getDoctrine()
            ->getRepository(Formation::class)
            ->findAll();
        return $this->render('@base/Default/forming.html.twig',array('f'=>$formations));
    }


    public function loginAction()
    {
        return $this->render('@base/Default/login.html.twig');
    }


    public function PdfAction(Request $request)

    {
        $snappy = $this->get('knp_snappy.pdf');

        $html = $this->renderView('@base/Default/pdf.html.twig', array(
            'title' => 'Hello World !'
        ));

        $filename = 'myFirstSnappyPDF';

        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
}
