<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LittoralController extends AbstractController
{
    /**
     * @Route("/littoral", name="littoral")
     */
    public function index()
    {
        return $this->render('littoral/index.html.twig', [
            'controller_name' => 'LittoralController',
        ]);
    }
}
