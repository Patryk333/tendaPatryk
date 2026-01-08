<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class IniciController extends AbstractController
{

    public function __construct(private LoggerInterface $logger) {

    }

    #[Route('/', name: 'inici', methods: ['GET'])]
    public function inici(Request $request): Response
    {
        $dataHora = new \DateTime();
        $this->logger->info('Nou acces usuari: { "ip":'. $request->getClientIp() . ', "moment":' . $dataHora->format("Y/m/d H:i:s") . ', "ruta":' . $request->getPathInfo());
        return $this->render('inici.html.twig');
    }
}
