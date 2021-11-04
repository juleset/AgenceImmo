<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrivacyController extends AbstractController
{
    /**
     * @Route("/privacy_legal-notices", name="legal_notices")
     */
    public function legal_notices(): Response
    {
        return $this->render('privacy/legal_notice.html.twig');
    }
}
