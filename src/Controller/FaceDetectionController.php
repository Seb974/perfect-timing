<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FaceDetectionController extends AbstractController
{
    /**
     * @Route("/face/detection", name="face_detection")
     */
    public function index()
    {
        return $this->render('face_detection/index.html.twig', [
            'controller_name' => 'FaceDetectionController',
        ]);
    }
}
