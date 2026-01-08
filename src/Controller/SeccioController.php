<?php

namespace App\Controller;

use App\Service\DadesSeccioServei;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeccioController extends AbstractController
{
    private array $seccions;

    public function __construct(private DadesSeccioServei $dades)
    {
        $this->seccions = $dades->get();
    }

    #[Route('/seccions', name: 'seccio_llistat')]
    public function llistat(): Response
    {
        return $this->render('seccio/llistat.html.twig', [
            'seccions' => $this ->seccions
        ]);
    }

    #[Route('/seccions/{codi}', name: 'seccio_detall')]
    public function detall(int $codi): Response
    {
        $seccio = null;
        foreach ($this->seccions as $s) {
            if ($s['codi'] == $codi) {
                $seccio = $s;
                break;
            }
        }

        if (!$seccio) {
            throw $this->createNotFoundException("Seccion no trobada");
        }

        $seccio['nombre_articles'] = count($seccio['articles']);
        $seccio['imatge'] = 'seccio' . $codi . '.jpg';

        return $this->render('seccio/detall.html.twig', [
            'seccio' => $seccio
        ]);
    }
}
