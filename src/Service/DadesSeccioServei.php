<?php

namespace App\Service;

class DadesSeccioServei
{
    private $seccions = [
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

    public function get(): array
    {
        return $this->seccions;
    }

    public function llistarSeccions(): array{
        return $this->seccions;
    }

    public function obtenirSeccio(int $codi): ?array
    {
        foreach ($this->seccions as $seccio) {
            if ((int)$seccio['codi'] === $codi) {
                $seccio['nombre_articles'] = count($seccio['articles']);
                $seccio['imatge'] = 'seccio' . $codi . '.jpg';
                return $seccio;
            }
        }

        return null;
    }
}

?>