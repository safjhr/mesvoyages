<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Description of AccueilController
 *
 * @author Fish
 */
class AccueilController {
    #[Route('/', name: 'accueil')]
    public function index() : Response{
        return new Response('Hello world ! ');
    }
}
