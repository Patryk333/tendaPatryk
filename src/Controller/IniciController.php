<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IniciController
{
    #[Route('/', name: 'inici', methods: ['GET'])]
    public function inici(): Response
    {
        return new Response("Projecte Gestió Tenda de Patryk Kowalik");
    }
}
?>