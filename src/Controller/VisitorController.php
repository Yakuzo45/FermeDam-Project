<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VisitorController extends AbstractController
{

    /**
     * @Route("/", name="Homepage")
     */
    public function index()
    {

        return $this->render('Visitor/index.html.twig');
    }
}
