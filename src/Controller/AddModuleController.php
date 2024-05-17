<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AddModuleController extends AbstractController
{
    #[Route('/add/module', name: 'add a module')]
    public function number(): Response
    {
        $number = random_int(0, 100);

        return $this->render('add_module.html.twig', [
        ]);

    }
}