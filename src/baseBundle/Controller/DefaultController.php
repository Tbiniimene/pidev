<?php

namespace baseBundle\Controller;

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
        return $this->render('@base/Default/shop.html.twig');
    }

    public function shop_detailsAction()
    {
        return $this->render('@base/Default/shop-details.html.twig');
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

    public function loginAction()
    {
        return $this->render('@base/Default/login.html.twig');
    }

}
