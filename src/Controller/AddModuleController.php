<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;
use App\Entity\History;
use App\Form\ModuleType;
use Symfony\Component\HttpFoundation\Request;

class AddModuleController extends AbstractController
{
    #[Route('/add/module', name: 'add a module')]
    public function add_module(EntityManagerInterface $entityManager, Request $request): Response
    {

        $module = new Module();
        $form = $this->createForm(ModuleType::class, $module);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $valid_module = $form->getData();
            $valid_module->setCreatedAt(new \DateTime());
            $entityManager->persist($valid_module);
            $entityManager->flush();

            $history1 = new History();
            $history1->setDate(new \DateTime());
            $history1->setLabel("Module created !");
            $history1->setName($valid_module->getName());
            $entityManager->persist($history1);
            $entityManager->flush();
            
            $this->addFlash('success', 'Module added !');

            return $this->redirectToRoute('add a module');
        }

        return $this->render('add_module.html.twig', [
            "form_add_module" => $form,
        ]);

    }
}