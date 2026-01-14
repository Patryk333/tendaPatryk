<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $preu = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\Column(length: 255)]
    private ?string $imatge = null;

    #[ORM\ManyToOne(inversedBy: 'seccioArticles')]
    private ?Seccio $seccio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPreu(): ?float
    {
        return $this->preu;
    }

    public function setPreu(float $preu): static
    {
        $this->preu = $preu;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getImatge(): ?string
    {
        return $this->imatge;
    }

    public function setImatge(string $imatge): static
    {
        $this->imatge = $imatge;

        return $this;
    }

    public function getSeccio(): ?Seccio
    {
        return $this->seccio;
    }

    public function setSeccio(?Seccio $seccio): static
    {
        $this->seccio = $seccio;

        return $this;
    }
}
