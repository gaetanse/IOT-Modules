<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Data;

class DataDetailsController extends AbstractController
{
    #[Route('/data/{id}', name: 'data details')]
    public function get_by_id_data(EntityManagerInterface $entityManager, $id): Response
    {

        $data = $entityManager->getRepository(Data::class)->findById($id);

        return $this->render('dataDetails.html.twig', [
            'data' => $data[0],
        ]);

    }
}