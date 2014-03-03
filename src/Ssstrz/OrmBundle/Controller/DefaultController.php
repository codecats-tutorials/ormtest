<?php

namespace Ssstrz\OrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SsstrzOrmBundle:Default:index.html.twig', array('name' => $name));
    }
}
