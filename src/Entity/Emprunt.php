<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\EmpruntRepository;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateEmprunt;

    #[ORM\Column(type: 'date')]
    private \DateTimeInterface $dateRetourPrevue;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $dateRetourEffective = null;

    #[ORM\Column(length: 50)]
    private string $statut;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livre $livre = null;

    #[ORM\ManyToOne(inversedBy: 'empruntsValides')]
    private ?User $bibliothecaire = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;
}
