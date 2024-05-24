<?php

namespace App\MessageHandler;

use App\Messages\Test;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Module;
use App\Entity\Data;
use App\Entity\History;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

#[AsMessageHandler]
final class TestHandler
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    public function __invoke(Test $test): void
    {
        
        $modules = $this->entityManager->getRepository(Module::class)->findAll();
        if(count($modules)>0)
        {
            $number = random_int(1, 1000);
            $numberModule = random_int(1, count($modules));
            $numberModule = $numberModule -1;
            $data = new Data();
            $data->setValeur($number);
            $data->setType($modules[$numberModule]->getId());
            $data->setCreatedAt(new \DateTime());

            if($number % 2 !== 0)
            {
                $modules[$numberModule]->setIsDown(true);
            }
            else{
                $modules[$numberModule]->setIsDown(false);
            }

            $modules[$numberModule]->setModifyAt(new \DateTime());

            $this->entityManager->persist($modules[$numberModule]);
            $this->entityManager->persist($data);
            $this->entityManager->flush();

            $history1 = new History();
            $history1->setDate(new \DateTime());
            $history1->setLabel("Data created !");
            $history1->setName($modules[$numberModule]->getName());
            $this->entityManager->persist($history1);
            $this->entityManager->flush();

            $history2 = new History();
            $history2->setDate(new \DateTime());
            $history2->setLabel("Module modified !");
            $history2->setName($modules[$numberModule]->getName());
            $this->entityManager->persist($history2);
            $this->entityManager->flush();
        }
        else{
            echo "You need to add a module !";
        }

    }
}