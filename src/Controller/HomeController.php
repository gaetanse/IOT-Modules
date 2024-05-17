<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        $loaded = false;

        $modules = ['aa','bb'];

        return $this->render('home.html.twig', [
            'number' => $number,
            'modules' => $modules,
        ]);

    }
}