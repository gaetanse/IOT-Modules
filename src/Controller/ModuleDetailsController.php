<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;
use App\Entity\Data;

class ModuleDetailsController extends AbstractController
{
    #[Route('/module/{id}', name: 'module details')]
    public function number(EntityManagerInterface $entityManager, $id): Response
    {

        $module = $entityManager->getRepository(Module::class)->findById($id);
        $dataByModuleAndType = $entityManager->getRepository(Data::class)->findBy([
            'type' => $module[0]->getId()
        ]);

        return $this->render('moduleDetails.html.twig', [
            'module' => $module[0],
            'datas' => $dataByModuleAndType,
        ]);

    }
}