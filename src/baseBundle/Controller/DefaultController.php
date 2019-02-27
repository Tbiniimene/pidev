<?php

namespace baseBundle\Controller;
use baseBundle\Entity\Formation;
use baseBundle\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    public function shopAction()
    {

            $em = $this->getDoctrine()->getManager();
            $categories = $em->getRepository('baseBundle:Categorie')->findAll();
            $matriels = $em->getRepository('baseBundle:Materiels')->findAll();

            return $this->render('@base/Default/shop.html.twig',
                array("categories" => $categories, "matriels" => $matriels));

    }



    public function shop_detailsAction(Request $request, $id)

    {
        $matriel = $this->getDoctrine()->getRepository(Materiels::class)->find($id);
        $categories = $this->getDoctrine()->getRepository('baseBundle:Categorie')->findAll();

        return $this->render('@base/Default/shop-details.html.twig', array("categories" => $categories,"matriels" => $matriel));
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

}
