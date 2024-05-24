<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Data;

class DataController extends AbstractController
{
    #[Route('/datas', name: 'datas')]
    public function get_all_data(EntityManagerInterface $entityManager): Response
    {

        $datas = $entityManager->getRepository(Data::class)->findAll();
        
        return $this->render('data.html.twig', [
            'datas' => $datas,
        ]);

    }
}