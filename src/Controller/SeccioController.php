<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/seccions', name: 'seccions')]
class SeccioController
{
    private $seccions = [
    [
        "codi" => "1",
        "nom" => "Roba",
        "descripcio" => "Secció de roba",
        "any" => "2026",
        "articles" => ["Pantalons", "Camisa", "Jersei", "Jaqueta"]
    ]
];



    #[Route('/{codi}', name: 'voreSeccio', methods: ['GET'])]
    public function voreSeccio(int $codi): Response
    {
        $resultat = array_filter(
            $this->seccions,
            function ($seccio) use ($codi) {
                return $seccio['codi'] == $codi;
            }
        );

        if (!$resultat)
            return new Response('Contacte no trobat');

        // Torna 1r element
        $seccio = array_shift($resultat);
        $resp = "<ul> <li>{$seccio['nom']}</li> <li>{$seccio['descripcio']}</li> <li>{$seccio['any']}</li> <li>Articles: <ul>";
        foreach ($seccio['articles'] as $article) {
            $resp .= "<li>$article</li>";
        }
        $resp .= " </ul> </li> </ul>";

        return new Response("<html><body>$resp</body></html>");
    }
}
?>