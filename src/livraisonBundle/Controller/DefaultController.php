<?php

namespace livraisonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('livraisonBundle:Default:index.html.twig');
    }
}
