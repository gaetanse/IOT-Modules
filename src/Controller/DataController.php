<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Data;

class DataController extends AbstractController
{
    #[Route('/data', name: 'data')]
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(0, 100);

        $loaded = false;

        //$datas = ['aa','bb', 'cc', 'dd', 'ee'];

        
        $datas = $entityManager->getRepository(Data::class)->findAll();

        return $this->render('data.html.twig', [
            'number' => $number,
            'datas' => $datas,
        ]);

    }
}