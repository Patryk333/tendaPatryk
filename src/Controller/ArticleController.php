<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;
use App\Entity\Seccio;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/articles', name: 'article_')]
class ArticleController extends AbstractController
{

    private $repositori;
    private $repositoriSeccio;

    public function __construct(private EntityManagerInterface $gestor)
    {
        $this->repositori = $this->gestor->getRepository(Article::class);
        $this->repositoriSeccio = $this->gestor->getRepository(Seccio::class);
    }



    #[Route('/crear', name: 'crear', methods: ['GET'])]
    public function afegir()
    {

        try {
            $seccioRopa = $this->repositoriSeccio->find(1);
            $seccioElectronica = $this->repositoriSeccio->find(2);

            $article1 = new Article();
            $article2 = new Article();
            $article3 = new Article();
            $article4 = new Article();

            $article5 = new Article();
            $article6 = new Article();
            $article7 = new Article();

            $article1->setNom("Pantalones");
            $article1->setPreu(29.99);
            $article1->setStock(127);
            $article1->setImatge("pantalones.jpg");
            $article1->setSeccio($seccioRopa);

            $article2->setNom("Camisa");
            $article2->setPreu(39.99);
            $article2->setStock(208);
            $article2->setImatge("camisa.jpg");
            $article2->setSeccio($seccioRopa);

            $article3->setNom("Jersei");
            $article3->setPreu(34.99);
            $article3->setStock(54);
            $article3->setImatge("jersei.jpg");
            $article3->setSeccio($seccioRopa);

            $article4->setNom("Chaqueta");
            $article4->setPreu(44.99);
            $article4->setStock(361);
            $article4->setImatge("chaqueta.jpg");
            $article4->setSeccio($seccioRopa);

            $article5->setNom("Televisor");
            $article5->setPreu(249.99);
            $article5->setStock(23);
            $article5->setImatge("televisor.jpg");
            $article5->setSeccio($seccioElectronica);

            $article6->setNom("Movil");
            $article6->setPreu(499.99);
            $article6->setStock(32);
            $article6->setImatge("movil.jpg");
            $article6->setSeccio($seccioElectronica);

            $article7->setNom("Auriculares");
            $article7->setPreu(49.99);
            $article7->setStock(64);
            $article7->setImatge("auriculares.jpg");
            $article7->setSeccio($seccioElectronica);

            $this->gestor->persist($article1);
            $this->gestor->persist($article2);
            $this->gestor->persist($article3);
            $this->gestor->persist($article4);
            $this->gestor->persist($article5);
            $this->gestor->persist($article6);
            $this->gestor->persist($article7);

            $this->gestor->flush();

            return $this->render('seccio/afegir.html.twig', [
                'message' => "Se han creado los articulos con exito",
                'details' => 'Articulos ' . $article1->getId() . ", " . $article2->getId() . ", " . $article3->getId() . ", " . $article4->getId() . ", " . $article5->getId() . ", " . $article6->getId() . " y " . $article7->getId() .  " creadas con exito."
            ]);
        } catch (Exception $e) {
            return $this->render('seccio/error.html.twig', [
                'message' => 'Error al crear los articulos',
                'details' => $e
            ]);
        }
    }
}
