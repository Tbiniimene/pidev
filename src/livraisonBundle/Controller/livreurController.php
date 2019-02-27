<?php

namespace livraisonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class livreurController extends Controller
{
    public function loginAction()
    {
        if(isset($_POST['username']) && isset($_POST['pass']))
        {
            $name=$_POST['username'];
            $pass=$_POST['pass'];

            $data = array(
                'name' => $name,
                'pass'=>$pass
            );
            $pusher = $this->get('mrad.pusher.notificaitons');
            $pusher->trigger($data);

            //check data base else render login route

            return $this->redirectToRoute('livreur_index');
        }

        return $this->render('@livraison/livreur/login.html.twig');
    }

    public function indexAction()
    {
        return $this->render('@livraison/livreur/index.html.twig');

    }


}
