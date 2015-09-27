<?php

namespace Bundles\RESTBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RESTBundle:Default:index.html.twig', array('name' => $name));
    }
}
