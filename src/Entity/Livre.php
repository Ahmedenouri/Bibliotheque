<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\LivreRepository;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column]
    private float $prix;

    #[ORM\Column(length: 20)]
    private string $type;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $categorie = null;

    #[ORM\OneToMany(mappedBy: 'livre', targetEntity: Emprunt::class)]
    private Collection $emprunts;

    #[ORM\OneToMany(mappedBy: 'livre', targetEntity: LigneCommande::class)]
    private Collection $ligneCommandes;

    #[ORM\OneToOne(mappedBy: 'livre', targetEntity: LivrePdf::class, cascade: ['persist','remove'])]
    private ?LivrePdf $pdf = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
    }
}
