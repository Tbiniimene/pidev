<?php

namespace baseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@base/Default/index.html.twig');
    }
    public function blogAction()
    {
        return $this->render('@base/Default/blog.html.twig');
    }
    public function aboutAction()
    {
        return $this->render('@base/Default/about.html.twig');
    }
}
