<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;

class ModuleController extends AbstractController
{
    #[Route('/modules', name: 'modules')]
    public function number(EntityManagerInterface $entityManager): Response
    {

        $modules = $entityManager->getRepository(Module::class)->findAll();
        $datas = [];

        return $this->render('module.html.twig', [
            'modules' => $modules,
        ]);

    }
}