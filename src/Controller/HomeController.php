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

        $loaded = false;

        //$modules = ['aa','bb'];

        /*
        $process = new PhpProcess('<?php 
        echo "start";
        sleep(1);
        echo "end";
        ?>');
        $process->run();
        if ($process->isSuccessful()) {
            $modules = ["aa","bb", "cc"]; 
        }
        $content = $process->getOutput()."\n";
        */

        $modules = $entityManager->getRepository(Module::class)->findAll();

        return $this->render('home.html.twig', [
            'number' => $number,
            'modules' => $modules,
        ]);

    }

    #[Route('/add_test', name: 'test')]
    public function add_data(KernelInterface $kernel): Response
    {

        /*
        $process = new PhpProcess('<?php 
        sleep(10);
        echo "Hello World"; 
        ?>');
        $process->run();
        $content = $process->getOutput()."\n";
        */

        /*$process = new Process(['php bin/console list']);
        $process->run();
        $valuereturn = $process->getOutput();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $number = random_int(0, 100);
        $modules = ['aa','bb'];
        return $this->render('home.html.twig', [
            'number' => $valuereturn,
            'modules' => $modules,
        ]);*/

        //$application = new Application('echo', '1.0.0');
        /*$application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            //'command' => 'debug:twig',
            'command' => 'echo 1.0',
        ]);

        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput();
        $application->run($input, $output);

        // return the output, don't use if you used NullOutput()
        $content = $output->fetch();*/

        // return new Response(""), if you used NullOutput()
        return new Response($content);

    }
}