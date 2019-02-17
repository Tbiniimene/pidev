<?php

namespace materielleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('materielleBundle:Default:index.html.twig');
    }
}
