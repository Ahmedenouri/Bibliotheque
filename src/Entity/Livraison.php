<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $adresse;

    #[ORM\Column(length: 50)]
    private string $statut;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateLivraison;

    #[ORM\OneToOne(inversedBy: 'livraison')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;

}
