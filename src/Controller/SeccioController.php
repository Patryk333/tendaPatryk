<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeccioController extends AbstractController
{
    #[Route('/seccions', name: 'seccio_llistat')]
    public function llistat(): Response
    {
        $seccions = [
            [
                "codi" => "1",
                "nom" => "Ropa",
                "descripcio" => "Seccion de ropa",
                "any" => "2026",
                "articles" => [
                ["nom" => "Pantalones", "descripcio" => "Pantalones vaqueros", "imatge" => "pantalones.jpg"],
                ["nom" => "Camisa", "descripcio" => "Camisa de manga larga", "imatge" => "camisa.jpg"],
                ["nom" => "Jersei", "descripcio" => "Jersei de lana", "imatge" => "jersei.jpg"],
                ["nom" => "Chaqueta", "descripcio" => "Chaqueta impermeable", "imatge" => "chaqueta.jpg"]
            ]
            ],
            [
                "codi" => "2",
                "nom" => "Electronica",
                "descripcio" => "Seccion de electronica",
                "any" => "2025",
                "articles" => [
                ["nom" => "Televisor", "descripcio" => "TV 4K 55 pulgadas", "imatge" => "televisor.jpg"],
                ["nom" => "Movil", "descripcio" => "Smartphone moderno", "imatge" => "movil.jpg"],
                ["nom" => "Auriculares", "descripcio" => "Auriculares bluetooth", "imatge" => "auriculares.jpg"]
            ]
            ]
        ];

        return $this->render('seccio/llistat.html.twig', [
            'seccions' => $seccions
        ]);
    }

    #[Route('/seccions/{codi}', name: 'seccio_detall')]
    public function detall(int $codi): Response
    {
        $allSeccions = [
            [
                "codi" => "1",
                "nom" => "Ropa",
                "descripcio" => "Seccion de ropa",
                "any" => "2026",
                "articles" => [
                ["nom" => "Pantalones", "descripcio" => "Pantalones vaqueros", "imatge" => "pantalones.webp"],
                ["nom" => "Camisa", "descripcio" => "Camisa de manga larga", "imatge" => "camisa.webp"],
                ["nom" => "Jersei", "descripcio" => "Jersei de lana", "imatge" => "jersei.webp"],
                ["nom" => "Chaqueta", "descripcio" => "Chaqueta impermeable", "imatge" => "chaqueta.webp"]
            ]
            ],
            [
                "codi" => "2",
                "nom" => "Electronica",
                "descripcio" => "Seccion de electronica",
                "any" => "2025",
                "articles" => [
                ["nom" => "Televisor", "descripcio" => "TV 4K 55 pulgadas", "imatge" => "televisor.webp"],
                ["nom" => "Movil", "descripcio" => "Smartphone moderno", "imatge" => "movil.webp"],
                ["nom" => "Auriculares", "descripcio" => "Auriculares bluetooth", "imatge" => "auriculares.webp"]
            ]
            ]
        ];

        $seccio = null;
        foreach ($allSeccions as $s) {
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
