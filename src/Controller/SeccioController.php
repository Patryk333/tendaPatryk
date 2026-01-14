<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Seccio;
use App\Service\DadesSeccioServei;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeccioController extends AbstractController
{

    private $repositori;

    public function __construct(private DadesSeccioServei $dades,private EntityManagerInterface $gestor)
    {
        $this->repositori = $this->gestor->getRepository(Seccio::class);
    }

    #[Route('/seccions', name: 'seccio_llistat')]
    public function llistat(): Response
    {
        return $this->render('seccio/llistat.html.twig', [
            'seccions' => $this->dades->llistarSeccions()
        ]);
    }

    #[Route('/seccions/crear', name: 'crear', methods: ['GET'])]
    public function afegir()
    {
        // $comarca = new Comarca();
        // $comarca->setNom("Ferland Mendy");

        // $contacte = new Contacte();
        // $contacte->setNom("Juan Cuesta");
        // $contacte->setTelefon("659231544");
        // $contacte->setEmail("juan@simarro.org");
        // $contacte->setComarca($comarca);

        // // Indiquem que volem guardar aquest objecte
        // $this->gestor->persist($contacte);
        // $this->gestor->persist($comarca);
        // // S’executa la inserció
        // $this->gestor->flush();

        // return new Response("Contacte " . $contacte->getId() . " guardat.");

        $seccio1 = new Seccio();
        $seccio2 = new Seccio();

        $seccio1->setNom("Ropa");
        $seccio1->setDescripcio("Seccion de ropa");
        $seccio1->setAny(2026);
        $seccio1->setImatge("Ropa");

        $seccio2->setNom("Electronica");
        $seccio2->setDescripcio("Seccion de Electronica");
        $seccio2->setAny(2025);
        $seccio2->setImatge("Electronica");

        $this->gestor->persist($seccio1);
        $this->gestor->persist($seccio2);

        $this->gestor->flush();

        return new Response("Seccions " . $seccio1->getId() . " i " . $seccio2->getId() . " guardat.");
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
