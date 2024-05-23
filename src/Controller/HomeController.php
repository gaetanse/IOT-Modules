<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\PhpProcess;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;
use App\Entity\Data;


use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpKernel\KernelInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(1, 5);

        $modules = $entityManager->getRepository(Module::class)->findAll();

        $modulesDataLength = [];
        for ($i = 0; $i <= count($modules)-1; $i++) {
            $dataByModuleAndType = $entityManager->getRepository(Data::class)->findBy([
                'type' => $modules[$i]->getId()
            ]);
            $modulesDataLength[] = count($dataByModuleAndType);
        }

        $datas = $entityManager->getRepository(Data::class)->findAll();

        return $this->render('home.html.twig', [
            'number' => $number,
            'modules' => $modules,
            'modulesDataLength' => $modulesDataLength,
            'datas' => $datas,
        ]);

    }

}