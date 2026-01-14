<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Seccio;
use App\Service\DadesSeccioServei;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/seccions', name: 'seccio_')]
class SeccioController extends AbstractController
{

    private $repositori;

    public function __construct(private DadesSeccioServei $dades, private EntityManagerInterface $gestor)
    {
        $this->repositori = $this->gestor->getRepository(Seccio::class);
    }

    #[Route('/', name: 'llistat')]
    public function llistat(): Response
    {

        return $this->render('seccio/llistat.html.twig', [
            'seccions' => $this->repositori->findAll()
        ]);
    }

    #[Route('/crear', name: 'crear', methods: ['GET'])]
    public function afegir()
    {

        try {
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

            return $this->render('seccio/afegir.html.twig', [
                'message' => "Se han creado las secciones con exito",
                'details' => 'Secciones ' . $seccio1->getId() . " y " . $seccio2->getId() . " creadas con exito."
            ]);
        } catch (Exception $e) {

            return $this->render('seccio/error.html.twig', [
                'message' => 'Error al crear las secciones',
                'details' => $e
            ]);
        }
    }

    #[Route('/{codi}', name: 'detall')]
    public function detall(int $codi): Response
    {
        $seccio = $this->repositori->find($codi);

        if (!$seccio) {
            throw $this->createNotFoundException('Secció no trobada');
        }

        return $this->render('seccio/detall.html.twig', [
            'seccio' => $seccio
        ]);
    }
}
