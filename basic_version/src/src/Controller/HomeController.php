<?php declare(strict_types=1);

namespace Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController {

    public function indexAction(): Response {
        return $this->render('Home/index.html.twig');
    }

}