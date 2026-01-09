<?php

namespace App\Controller;

use App\Service\DadesSeccioServei;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeccioController extends AbstractController
{

    public function __construct(private DadesSeccioServei $dades)
    {
    }

    #[Route('/seccions', name: 'seccio_llistat')]
    public function llistat(): Response
    {
        return $this->render('seccio/llistat.html.twig', [
            'seccions' => $this->dades->llistarSeccions()
        ]);
    }

    #[Route('/seccions/{codi}', name: 'seccio_detall')]
    public function detall(int $codi): Response
    {
        $seccio = $this->dades->obtenirSeccio($codi);

        if (!$seccio) {
            throw $this->createNotFoundException('Secció no trobada');
        }

        return $this->render('seccio/detall.html.twig', [
            'seccio' => $seccio
        ]);
    }
}
