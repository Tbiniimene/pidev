<?php

namespace livraisonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@livraison/Default/index.html.twig');
    }
    public function loginAction()
    {
        return $this->render('@livraison/livreur/login.html.twig');
    }

}
