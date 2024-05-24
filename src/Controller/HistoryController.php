<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\History;

class HistoryController extends AbstractController
{
    #[Route('/history', name: 'history')]
    public function get_all_history(EntityManagerInterface $entityManager): Response
    {

        $history = $entityManager->getRepository(History::class)->findAll();

        return $this->render('history.html.twig', [
            'history' => $history,
        ]);

    }

}