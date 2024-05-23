<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;
use App\Entity\Data;

class ModuleController extends AbstractController
{
    #[Route('/modules', name: 'modules')]
    public function number(EntityManagerInterface $entityManager): Response
    {

        $modules = $entityManager->getRepository(Module::class)->findAll();

        $modulesDataLength = [];
        for ($i = 0; $i <= count($modules)-1; $i++) {
            $dataByModuleAndType = $entityManager->getRepository(Data::class)->findBy([
                'type' => $modules[$i]->getId()
            ]);
            $modulesDataLength[] = count($dataByModuleAndType);
        }

        return $this->render('module.html.twig', [
            'modules' => $modules,
            'modulesDataLength' => $modulesDataLength,
        ]);

    }
}