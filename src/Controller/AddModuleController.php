<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;

class AddModuleController extends AbstractController
{
    #[Route('/add/module', name: 'add a module')]
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(0, 100);

        $module = new Module();
        $module->setName('Camera');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($module);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->render('add_module.html.twig', [
        ]);

    }
}