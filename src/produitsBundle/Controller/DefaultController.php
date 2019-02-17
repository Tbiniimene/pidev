<?php

namespace produitsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('produitsBundle:Default:index.html.twig');
    }
}
